@php
use Illuminate\Support\Facades\Route;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Input Ukuran Pemeriksaan') }}
        </h2>
    </x-slot>

    <form action="{{ route('ukurans.store') }}" method="POST">
        @csrf
        
        <!-- Tambahkan ini di bagian atas form -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-6  rounded mt-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="py-6">
            <div class="max-w-6xl mx-auto sm:px-3 lg:px-6 mb-6 mt-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end item-center py-2 px-8"> <!-- Menyusun elemen secara horizontal dan posisi ke kanan -->
                        <a href="{{ url('/patients/create') }}" class="text-blue-600 hover:underline font-bold text-lg transition duration-300 transform hover:scale-25 bg-blue-100 p-2 rounded ml-2">
                            &#43; Pasien Baru
                        </a>
                    </div>
                    <div class="p-1 text-gray-900">
                        <div class="max-w-2xl mb-4 px-4">
                            <div class="justify-start">
                                <input type="text" id="searchPatient" placeholder="Cari nama pasien..." value="{{ request('search') }}" class="flex-grow px-3 py-2 text-sm border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 text-sm rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Cari</button>
                            </div>
                            <div class="flex mb-2">
                                <select name="patient_id" id="patient_id" class="w-full border rounded px-3 py-2">
                                    <option value="">Pilih Pasien </option>
                                    @forelse($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @empty
                                        <option value="" disabled style="color: red;">Tidak ada data pasien</option>
                                    @endforelse
                                </select>
                            </div>
                            @if($patients->isEmpty())
                                <div class="text-red-500 mt-2">Data tidak ditemukan</div>
                            @endif    
                        </div>
                       
                        <div class="mb-4 px-4">
                            <label for="keluhan" class="block text-l font-medium text-blue-700">Keluhan:</label>
                            <select name="keluhan" id="keluhan" class="w-2/3 border rounded px-2 py-1" required>
                                <option value="">Pilih Keluhan</option>
                                <option value="Melihat jauh kabur">Melihat jauh kabur</option>
                                <option value="Melihat dekat atau membaca kabur">Melihat dekat atau membaca kabur</option>
                                <option value="Melihat berbayang/silau">Melihat berbayang/silau</option>
                                <option value="Kacamata lama kabur">Kacamata lama kabur</option>
                                <option value="Kacamata lama tidak nyaman/pusing">Kacamata lama tidak nyaman/pusing</option>
                            </select>
                        </div>
                        <div class="mb-4 px-4">
                            <label for="riwayat_penyakit" class="block text-l font-medium text-blue-700">Riwayat penyakit:</label>
                            <select name="riwayat_penyakit" id="riwayat_penyakit" class="w-2/3 border rounded px-2 py-1" required>
                                <option value="" class="text-gray-700 italic">Riwayat Penyakit</option>
                                <option value="Diabetes Melitus">Diabetes Melitus</option>
                                <option value="Hipertensi">Hipertensi</option>
                                <option value="Katarak">Katarak</option>
                                <option value="Glaukoma">Glaukoma</option>
                                <option value="Lainnya">Lainnya</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                        </div>
                        <div class="mb-4 px-4 ">
                            <label for="ukuran_kacamata_lama" class="block text-l font-medium text-blue-700 ">Ukuran Kacamata Lama/Terakhir:</label>
                            <input type="text" name="ukuran_kacamata_lama" id="ukuran_kacamata_lama" class="w-2/3 border rounded px-2 py-3" placeholder="Ukuran kacamata lama">
                        </div>
                        <div class="mb-4 px-4">
                            <label for="registration_number" class="block text-l font-medium text-blue-700">Nomor Registrasi:</label>
                            <input type="text" name="registration_number" id="registration_number" class="w-2/3 border rounded px-2 py-1" value="{{ $registrationNumber }}" readonly>
                        </div>
                </div>
            </div>
        
        </div>
    
        <div class="flex justify-center "> <!-- Mengurangi jarak antara container kanan dan kiri --> 
            <div class="py-px ">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 ml-auto mt-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                                <div class="mb-4">
                                <div class="flex justify-between items-center mb-4">
                                    <label for="patient_id" class="block text-xl font-medium text-blue-700">Refraksi Objektif <br><span class="text-gray-500 text-sm">Autorefracto Meter, Streak Retinoskopi</span></br></label>                                                   
                                </div>
                            <div class=" max-w-1xl grid grid-cols-1 gap-0 mb-4">
                                <!-- Right Eye -->
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Right Eye</h3>
                                    <div class="grid grid-cols-3 gap-2 bg-gray-100">
                                        <div>
                                            <label for="righto_sph" class="block text-sm">Sph:</label>
                                            <select name="righto_sph" id="righto_sph" class="w-full border rounded px-2 py-1 text-sm">
                                                <option value="-25.00">-25.00</option>
                                                <!-- Generate options from -25.00 to 25.00 with step 0.25 -->
                                                @for ($i = -25; $i <= 25; $i += 0.25)
                                                    <option value="{{ number_format($i, 2) }}" {{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <label for="righto_cyl" class="block text-sm">Cyl:</label>
                                            <select  name="righto_cyl" id="righto_cyl" class="w-full border rounded px-2 py-1 text-sm">
                                                <option value="-0.00">-0.00</option>
                                                @for ($i = -6; $i <= 0; $i += 0.25)
                                                    <option value="{{ number_format($i, 2) }}"{{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <label for="righto_axis" class="block text-sm">Axis:</label>
                                            <input type="number" name="righto_axis" id="righto_axis" step="1" min="0" max="180" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('righto_axis') }}">
                                        </div>                                                            
                                    </div>
                                </div>
                                <!-- Left Eye -->
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Left Eye</h3>
                                    <div class="grid grid-cols-3 gap-2 bg-gray-100"> <!-- Ganti warna latar belakang menjadi kuning untuk sebelah kiri -->
                                        <div>   
                                            <label for="lefto_sph" class="block text-sm">Sph:</label>
                                            <select name="lefto_sph" id="lefto_sph" class="w-full border rounded px-2 py-1 text-sm">
                                                <option value="-25.00">-25.00</option>
                                                @for ($i = -25; $i <= 25; $i += 0.25)
                                                    <option value="{{ number_format($i, 2) }}" {{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <label for="lefto_cyl" class="block text-sm">Cyl:</label>
                                            <select name="lefto_cyl" id="lefto_cyl" class="w-full border rounded px-2 py-1 text-sm">
                                                <option value="-0.00">-0.00</option>
                                                @for ($i = -6; $i <= 0; $i += 0.25)
                                                    <option value="{{ number_format($i, 2) }}"{{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <label for="lefto_axis" class="block text-sm">Axis:</label>
                                            <input type="number" name="lefto_axis" id="lefto_axis" step="1" min="0" max="180" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('lefto_axis') }}">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            
         </div>
       </div>
     
        <div class="py-px">
            <div class="max-w-3xl mx-auto sm:px-6  ml-auto mt-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-4">
                            <div class=" mb-4">
                                <label for="patient_id" class="block text-xl font-medium text-blue-700">Refraksi Subjektif <br><span class="text-gray-500 text-sm">Phoroptor, Triallens</span></br></label>                              
                            </div>                   
                        </div>
                        <div class=" max-w-1xl grid grid-cols-1 gap-0 mb-4">
                            <!-- Right Eye -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Right Eye</h3>
                                <div class="grid grid-cols-7 gap-2 bg-gray-100">
                                    <div>
                                        <label for="right_sph" class="block text-sm">Sph:</label>
                                        <select name="right_sph" id="right_sph" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="-25.00">-25.00</option>
                                            <!-- Generate options from -25.00 to 25.00 with step 0.25 -->
                                            @for ($i = -25; $i <= 25; $i += 0.25)
                                                <option value="{{ number_format($i, 2) }}" {{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label for="right_cyl" class="block text-sm">Cyl:</label>
                                        <select  name="right_cyl" id="right_cyl" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="-0.00">-0.00</option>
                                            @for ($i = -6; $i <= 0; $i += 0.25)
                                                <option value="{{ number_format($i, 2) }}"{{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label for="right_axis" class="block text-sm">Axis:</label>
                                        <input type="number" name="right_axis" id="right_axis" step="1" min="0" max="180" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_axis') }}">
                                    </div>
                                    <div>
                                        <label for="right_add" class="block text-sm">Add:</label>
                                        <select name="right_add" id="right_add" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="0.00" selected>0.00</option>
                                            @for ($i = 4; $i >= 0.5; $i -= 0.25)
                                                <option value="{{ number_format($i, 2) }}"{{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                            @endfor
                                        </select>    
                                    </div>
                                    <div>
                                        <label for="right_prisma" class="block text-sm">Prisma:</label>
                                        <input type="text" name="right_prisma" id="right_prisma" step="1.00" min="1.00" max="10.00" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_prisma') }}">
                                    </div>
                                        <div>
                                        <label for="right_mpd" class="block text-sm">MPD:</label>
                                        <input type="number" name="right_mpd" id="right_mpd" step="1" min="20" max="40" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_mpd') }} " placeholder="isi 20-40" required>
                                    </div>
                                    <div>
                                        <label for="right_visus" class="block text-sm">Visus CC:</label>
                                        <select name="right_visus" id="right_visus" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="" disabled selected>Pilih Visus</option>
                                            <option value="6/6">6/6</option>
                                            <option value="6/7.5">6/7.5</option>
                                            <option value="6/9">6/9</option>
                                            <option value="6/12">6/12</option>
                                            <option value="6/18">6/18</option>
                                            <option value="6/24">6/24</option>
                                            <option value="6/30">6/30</option>
                                            <option value="6/60">6/60</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Left Eye -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Left Eye</h3>
                                <div class="grid grid-cols-7 gap-2 bg-gray-100"> <!-- Ganti warna latar belakang menjadi kuning untuk sebelah kiri -->
                                    <div>
                                        <label for="left_sph" class="block text-sm">Sph:</label>
                                        <select name="left_sph" id="left_sph" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="-25.00">-25.00</option>
                                            @for ($i = -25; $i <= 25; $i += 0.25)
                                                <option value="{{ number_format($i, 2) }}" {{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label for="left_cyl" class="block text-sm">Cyl:</label>
                                        <select name="left_cyl" id="left_cyl" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="-0.00">-0.00</option>
                                            @for ($i = -6; $i <= 0; $i += 0.25)
                                                <option value="{{ number_format($i, 2) }}"{{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label for="left_axis" class="block text-sm">Axis:</label>
                                        <input type="number" name="left_axis" id="left_axis" step="1" min="0" max="180" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_axis') }}">
                                    </div>
                                    <div>
                                        <label for="left_add" class="block text-sm">Add:</label>
                                        <select name="left_add" id="left_add" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="0.00" selected>0.00</option>
                                            @for ($i = 4; $i >= 0.50; $i -= 0.25)
                                                <option value="{{ number_format($i, 2) }}"{{ $i == 0 ? 'selected' : '' }}>{{ number_format($i, 2) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label for="left_prisma" class="block text-sm">Prisma:</label>
                                        <input type="text" name="left_prisma" id="left_prisma" step="1.00" min="1.00" max="10.00" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_prisma ') }}">
                                    </div>
                                    <div>
                                        <label for="left_mpd" class="block text-sm">MPD:</label>
                                        <input type="number" name="left_mpd" id="left_mpd" step="1" min="20" max="40" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_mpd') }} " placeholder="isi 20-40" required>
                                    </div>
                                    <div>
                                        <label for="left_visus" class="block text-sm">Visus CC:</label>
                                        <select name="left_visus" id="left_visus" class="w-full border rounded px-2 py-1 text-sm">
                                            <option value="" disabled selected>Pilih Visus</option>
                                            <option value="6/6">6/6</option>
                                            <option value="6/7.5">6/7.5</option>
                                            <option value="6/9">6/9</option>
                                            <option value="6/12">6/12</option>
                                            <option value="6/18">6/18</option>
                                            <option value="6/24">6/24</option>
                                            <option value="6/30">6/30</option>
                                            <option value="6/60">6/60</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        <div class="flex items-center space-x-1"> <!-- Menambahkan justify-end untuk memindahkan tombol ke kanan -->
                            <button type="button" id="copyRightToLeft" class="bg-gray-200 text-gray-700 px-2 py-2 rounded hover:bg-gray-300">
                                Copy Right to Left
                            </button>
                                
                          </div>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>

    <div class="py-6 max-w-6xl mx-auto mb-2 "> <!-- Mengatur lebar container -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 ">
                <label for="patient_id" class="block text-xl font-medium text-blue-700 ">Refraksi Binokuler <br><span class="text-gray-500 text-sm "> <span class="font-bold">Penglihatan binokuler </span> adalah proses ketika otak mengintegrasikan informasi dari kedua mata seseorang untuk menghasilkan gambar terpadu yang jelas dan tajam.</span></br></label>
                <hr class=" my-4 border-2 border-blue-500">
                
                <div class="mb-4 px-4">
                    <label for="keseimbangan_binokuler" class="block text-sm font-medium text-blue-700">Test Keseimbangan Binokuler:</label>
                    <input type="text" name="keseimbangan_binokuler" id="keseimbangan_binokuler" class="w-full border rounded px-2 py-1" placeholder="worth four dot test / prisma asosiasi">
                </div>
                <div class="mb-4 px-4">
                    <label for="titikakhir_binokuler" class="block text-sm font-medium text-blue-700">Test Titik Akhir Binokuler:</label>
                    <input type="text" name="titikakhir_binokuler" id="titikakhir_binokuler" class="w-full border rounded px-2 py-1" placeholder="dengan duckelder test">
                </div>
                <div class="mb-4 px-4">
                    <label for="diagnosa" class="block text-sm font-medium text-blue-700">Diagnosa & Kesimpulan Refraksi:</label>
                    <input type="text" name="diagnosa" id="diagnosa" class="w-full border rounded px-2 py-5" placeholder="isi dengan diagnosa & kesimpulan akhir">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ">Simpan</button> 

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchPatient');
        const patientSelect = document.getElementById('patient_id');
        const originalOptions = Array.from(patientSelect.options);

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredOptions = originalOptions.filter(option => 
                option.text.toLowerCase().includes(searchTerm)
            );

            patientSelect.innerHTML = '';
            filteredOptions.forEach(option => patientSelect.add(option));

            if (filteredOptions.length === 0) {
                const noResultOption = new Option('Tidak ada hasil yang cocok', '');
                noResultOption.disabled = true;
                patientSelect.add(noResultOption);
            }
        });

        const copyButton = document.getElementById('copyRightToLeft');

        copyButton.addEventListener('click', function() {
            const fields = ['sph', 'cyl', 'axis', 'add', 'mpd', 'prisma', 'visus'];
            fields.forEach(field => {
                const rightValue = document.getElementById(`right_${field}`).value;
                document.getElementById(`left_${field}`).value = rightValue;
            });
        });

        // Generate options for Sph from -25.00 to 25.00 with step 0.25
        const sphSelect = document.getElementById('right_sph'); // Assuming you want to populate the right_sph input
        const options = [];
        for (let i = -25; i <= 25; i += 0.25) {
            options.push((i).toFixed(2)); // Format to 2 decimal places
        }

        // Set default value
        sphSelect.value = '0.00';

        // Populate the select element (if it's a select, otherwise you can use it directly)
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option;
            sphSelect.appendChild(opt);
        });
    });
</script>                 
            </div>
        </div>
    </div>
</div>
</form>
</x-app-layout>
