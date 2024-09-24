<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Ukuran Pemeriksaan</title>
    <style>
        @page {
            size: 80mm 297mm;
            margin: 0;
        }
        body {
            font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            font-weight: 300;
            line-height: 1.6;
            color: #000;
            padding: 1mm;
        }
        .header {
            text-align: center;
            margin-bottom: 5mm;
            border-bottom: 1px solid #000;
            padding-bottom: 1mm;
        }
        .logo {
            max-width: 50mm;
            margin-bottom: 2mm;
        }
        h1 {
            font-size: 14pt;
            font-weight: 400;
            margin: 0;
        }
        .patient-info {
            margin-bottom: 5mm;
        }
        .section {
            margin-bottom: 5mm;
        }
        .section-title {
            font-weight: 400;
            border-bottom: 1px solid #000;
            margin-bottom: 2mm;
        }
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 2mm;
            text-align: left;
            font-weight: 300;
        }
        th {
            background-color: #f8f8f8;
            font-weight: 400;
        }
        .qr-code {
            text-align: center;
            margin-top: 5mm;
        }
        .qr-code img {
            max-width: 5mm;
        }
        @media print {
            body {
                width: 80mm;
                margin: 3px;
                padding: 5mm;
            }
            /* ... (style lainnya untuk pencetakan) ... */
        }

</style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
  </head>
<body>
    <!-- Konten yang akan dicetak -->
    {{-- <div class="header">
        <h1>Hasil Pemeriksaan Mata</h1>
    </div>

    <div class="patient-info">
        <p><strong>Nama:</strong> {{ $ukuran->patient->name }}</p>
        <p><strong>No. Registrasi:</strong> {{ $ukuran->registration_number }}</p>
        <p><strong>Tanggal:</strong> {{ $ukuran->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="section">
        <div class="section-title">Anamnesa</div>
        <p><strong>Keluhan:</strong> {{ $ukuran->keluhan }}</p>
        <p><strong>Riwayat Penyakit:</strong> {{ $ukuran->riwayat_penyakit }}</p>
        <p><strong>Ukuran Kacamata Lama:</strong> {{ $ukuran->ukuran_kacamata_lama ?? 'Tidak ada' }}</p>
    </div>

    <div class="section">
        <div class="section-title">Hasil Refraksi</div>
        <table>
            <thead>
                <tr>
                    <th>Rx</th>
                    <th>Sph</th>
                    <th>Cyl</th>
                    <th>Axis</th>
                    <th>Add</th>
                    <th>MPD</th>
                    <th>Visus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>R</td>
                    <td>{{ $ukuran->right_sph }}</td>
                    <td>{{ $ukuran->right_cyl }}</td>
                    <td>{{ $ukuran->right_axis }}</td>
                    <td>{{ $ukuran->right_add }}</td>
                    <td>{{ $ukuran->right_mpd }}</td>
                    <td>{{ $ukuran->right_visus }}</td>
                </tr>
                <tr>
                    <td><strong>L</strong></td>
                    <td>{{ $ukuran->left_sph }}</td>
                    <td>{{ $ukuran->left_cyl }}</td>
                    <td>{{ $ukuran->left_axis }}</td>
                    <td>{{ $ukuran->left_add }}</td>
                    <td>{{ $ukuran->left_mpd }}</td>
                    <td>{{ $ukuran->left_visus }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6 border-t pt-4">
        <h4 class="text-lg font-bold text-gray-800">Refraksi Binokuler</h4>
        <div class="mt-4 grid grid-cols-1 gap-4">
            <div>
                <h5 class="text-md font-semibold text-gray-700">Keseimbangan Binokuler:</h5>
                <p class="text-sm text-gray-600">{{ $ukuran->keseimbangan_binokuler ?? 'Tidak ada data' }}</p>
            </div>
            <div>
                <h5 class="text-md font-semibold text-gray-700">Titik Akhir Binokuler:</h5>
                <p class="text-sm text-gray-600">{{ $ukuran->titikakhir_binokuler ?? 'Tidak ada data' }}</p>
            </div>
            <div>
                <h5 class="text-md font-semibold text-gray-700">Diagnosa & Kesimpulan:</h5>
                <p class="text-sm text-gray-600">{{ $ukuran->diagnosa ?? 'Tidak ada data' }}</p>
            </div>
        </div>
    </div> --}}

 <div class="header text-center mb-4 my-6 "> <!-- Menambahkan style untuk memastikan teks berada di tengah -->
    <h3 style="font-weight: bold; font-family: 'Roboto', sans-serif;">Agung Optikal Batang</h3>
    <p style="font-size: 10px; line-height: 0.5;">Jl. Dr.Sutomo No.5 Kab Batang</p>
    <p style="font-size: 10px; line-height: 0.25;">Telp.081947164500</p>
    <p style="font-size: 10px; line-height: 0.25;">SIP No. 001/DPMPTSP/SIPO/2024</p>
    {{-- <hr class="h-px my-2 bg-gray-500 border-0 dark:bg-gray-700"> --}}
 </div>
    <div id="printable-content" class="space-y-1">
        <!-- Informasi Pelanggan -->
        <div class="gap-1 text-sm">
            <div>
                <p style="font-size:13px; line-height: 0.5; bold">No.{{ $ukuran->registration_number }}</p>
                <p style="font-size: 12px; line-height: 0.5;">{{ $ukuran->created_at->format('d/m/Y H:i') }}</p>

                <h3 class="text-lg font-semibold">{{ $ukuran->patient->name ?? 'Pasien tidak ditemukan' }}</h3>
                <p style="font-size:15px; line-height: 0.5;">{{ $ukuran->patient->address ?? 'Alamat tidak ditemukan' }}</p>
                <p style="font-size:14px; line-height: 0.5; ">{{ $ukuran->patient->phone_number ?? 'Nomor HP tidak ditemukan' }}</p>
            </div>
           
        </div>

        <h4 class="font-bold text-blue-500">Anamnesa</h4>
        <div class="space-y-1">
            <div class="bg-gray-50 p-2 rounded-md">
                <div class="grid grid-cols-1 gap-1 text-sm">
                    <div>
                        <span class="text-gray-600">Keluhan:</span>
                        <span class="font-medium">{{ $ukuran->keluhan }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Riwayat Penyakit:</span>
                        <span class="font-medium">{{ $ukuran->riwayat_penyakit }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Ukuran Kacamata Lama:</span>
                        <span class="font-medium">{{ $ukuran->ukuran_kacamata_lama ?? 'Tidak ada' }}</span>
                    </div>
                </div>
            </div>
            <h4 class="font-bold text-blue-500">Refraksi Objektif</h4>
            <div class="bg-gray-50 p-4 rounded-md">
                <table class="w-full max-w-md mx-auto"> <!-- Mengubah 'w-xl' menjadi 'w-full' -->
                    <thead>
                        <tr class="header-row">
                            <th class="header-cell">Rx</th>
                            <th class="header-cell">Sph</th>
                            <th class="header-cell">Cyl</th>
                            <th class="header-cell">Axis</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach(['righto' => 'R', 'lefto' => 'L'] as $side => $label)
                            <tr>
                                <td>{{ $label }}</td>
                                <td>{{ $ukuran->{$side . '_sph'} }}</td>
                                <td>{{ $ukuran->{$side . '_cyl'} }}</td>
                                <td>{{ $ukuran->{$side . '_axis'} }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h4 class="font-bold text-blue-500">Refraksi Subjektif</h4>
            <div class="bg-gray-50 p-4 rounded-md">
                <table class="w-full max-w-md mx-auto">
                    <thead>
                        <tr class="header-row">
                            <th class="header-cell">Rx</th>
                            <th class="header-cell">Sph</th>
                            <th class="header-cell">Cyl</th>
                            <th class="header-cell">Axis</th>
                            <th class="header-cell">Add</th>
                            <th class="header-cell">MPD</th>
                            <th class="header-cell">Prisma</th>
                            <th class="header-cell">Visus</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach(['right' => 'R', 'left' => 'L'] as $side => $label)
                            <tr>
                                <td>{{ $label }}</td>
                                <td>{{ $ukuran->{$side . '_sph'} }}</td>
                                <td>{{ $ukuran->{$side . '_cyl'} }}</td>
                                <td>{{ $ukuran->{$side . '_axis'} }}</td>
                                <td>{{ $ukuran->{$side . '_add'} }}</td>
                                <td>{{ $ukuran->{$side . '_mpd'} }}</td>
                                <td>{{ $ukuran->{$side . '_prisma'} }}</td>
                                <td>{{ $ukuran->{$side . '_visus'} }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <h4 class="font-bold text-blue-500 mt-6">Refraksi Binokuler</h4>
                    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h5 class="text-lg font-semibold text-gray-700 mb-2">Keseimbangan Binokuler</h5>
                                <p class="text-gray-600 bg-gray-100 p-3 rounded-md">
                                    {{ $ukuran->keseimbangan_binokuler ?? 'Tidak ada data' }}
                                </p>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold text-gray-700 mb-2">Titik Akhir Binokuler</h5>
                                <p class="text-gray-600 bg-gray-100 p-3 rounded-md">
                                    {{ $ukuran->titikakhir_binokuler ?? 'Tidak ada data' }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h5 class="text-lg font-semibold text-gray-700 mb-2">Diagnosa & Kesimpulan</h5>
                            <p class="text-gray-600 bg-gray-100 p-3 rounded-md">
                                {{ $ukuran->diagnosa ?? 'Tidak ada data' }}
                            </p>
                        </div>
                        <div class="qr-code" style="width: 30mm; height: auto;">
                            @if($ukuran->registration_number)
                                {!! $qrCode !!}
                            @else
                                <p>QR Code tidak tersedia</p>
                            @endif
                        </div>
                    </div>

                 </div>
            </div>
        </div>
    </div>

    {{-- <div class="qr-code">
        {!! $qrCode !!}
    </div> --}}

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
