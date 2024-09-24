<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use App\Models\Patient;
use App\Models\KeluhanUtama; // Pastikan model KeluhanUtama sudah dibuat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UkuranController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $ukurans = Ukuran::with('patient')
                         ->when($search, function ($query) use ($search) {
                             return $query->whereHas('patient', function ($q) use ($search) {
                                 $q->where('name', 'like', "%{$search}%")
                                   ->orWhere('phone_number', 'like', "%{$search}%");
                             })->orWhere('registration_number', 'like', "%{$search}%");
                         })
                         ->latest()
                         ->paginate(10);

        return view('ukurans.index', compact('ukurans', 'search'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'keluhan' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'ukuran_kacamata_lama' => 'nullable|string',
            'registration_number' => 'required|string|unique:ukurans',
            'righto_sph' => 'nullable|numeric',
            'righto_cyl' => 'nullable|numeric',
            'righto_axis' => 'nullable|numeric',
            'lefto_sph' => 'nullable|numeric',
            'lefto_cyl' => 'nullable|numeric',
            'lefto_axis' => 'nullable|numeric',
            'right_sph' => 'nullable|numeric',
            'right_cyl' => 'nullable|numeric',
            'right_axis' => 'nullable|numeric',
            'right_add' => 'nullable|numeric',
            'right_mpd' => 'nullable|numeric',
            'right_prisma' => 'nullable|string|max:50',
            'right_visus' => 'nullable|string|max:50',
            'left_sph' => 'nullable|numeric',
            'left_cyl' => 'nullable|numeric',
            'left_axis' => 'nullable|numeric',
            'left_add' => 'nullable|numeric',
            'left_mpd' => 'nullable|numeric',
            'left_prisma' => 'nullable|string|max:50',
            'left_visus' => 'nullable|string|max:50',
            'keseimbangan_binokuler' => 'nullable|string|max:255',
            'titikakhir_binokuler' => 'nullable|string|max:255',
            'diagnosa' => 'nullable|string',
        ]);

        // Ubah nilai null menjadi string kosong untuk kolom yang tidak boleh null
        $fieldsToCheck = ['right_prisma', 'left_prisma', 'right_visus', 'left_visus'];
        foreach ($fieldsToCheck as $field) {
            $validatedData[$field] = $validatedData[$field] ?? '';
        }

        try {
            $ukuran = Ukuran::create($validatedData);
            return redirect()->route('ukurans.show', $ukuran)->with('success', 'Data ukuran berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Error saving Ukuran: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    public function show(Ukuran $ukuran)
    {
        $ukuran->load('patient');
        
        // Pastikan registration_number ada
        if (!$ukuran->registration_number) {
            $ukuran->registration_number = $this->generateRegistrationNumber();
            $ukuran->save();
        }
        
        // Generate QR code
        $qrCode = QrCode::size(100)->generate($ukuran->registration_number);
        
        return view('ukurans.show', compact('ukuran', 'qrCode'));
    }

    public function create()
    {
        try {
            $patients = Patient::all();
            Log::info('Patients retrieved:', ['count' => $patients->count()]);
            $registrationNumber = $this->generateRegistrationNumber();
            return view('ukurans.create', compact('patients', 'registrationNumber'));
        } catch (\Exception $e) {
            Log::error('Error in create method: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat halaman.');
        }
    }

    public function print(Ukuran $ukuran)
    {
        $ukuran->load('patient');
        
        if (!$ukuran->registration_number) {
            $ukuran->registration_number = $this->generateRegistrationNumber();
            $ukuran->save();
        }
        
        $qrCode = QrCode::size(100)->generate($ukuran->registration_number);
        
        return view('ukurans.print', compact('ukuran', 'qrCode'));
    }

    private function generateRegistrationNumber()
    {
        $prefix = 'REG-';
        $date = now()->format('Ymd');
        $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        return $prefix . $date . '-' . $randomNumber;
    }
}
