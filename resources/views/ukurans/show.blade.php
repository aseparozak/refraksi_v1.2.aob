<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight dark:text-gray-200P">
            {{ __('Detail Refraksi') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-2">
                    <div class="flex justify-between items-center border-b pb-4">
                        <div>
                            <a href="{{ route('ukurans.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Kembali</a>
                            <a href="{{ route('ukurans.print', $ukuran) }}" target="_blank" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ml-2">Cetak</a>
                        </div>
                    </div>
                    
                    <!-- Konten yang akan dicetak -->
                    <div id="printable-content" class="space-y-2">
                        <div class="header text-center mb-4">
                            <h4 style="font-weight: bold; font-family: 'Roboto', sans-serif;">Agung Optikal Batang</h4>
                            <p style="font-size: 15px; line-height: 0.5;">Jl. Dr.Sutomo No.5 Batang</p>
                            <p style="font-size: 15px; line-height: 0.25;">Telp. 08573333333</p>
                            <p style="font-size: 12px; line-height: 0.25;">SIP No. 001/DPMPTSP/SIPO/2024</p>
                            <hr class="h-px my-2 bg-gray-500 border-0 dark:bg-gray-700">
                         </div>
                        <!-- Informasi Pelanggan -->
                        <div class="mb-1 flex justify-between items-start gap-1">
                            <div>
                                <p class="text-sm text-gray-600">No. Registrasi: {{ $ukuran->registration_number }}</p>
                                <p class="text-xs text-gray-600">{{ $ukuran->created_at->format('d/m/Y H:i') }}</p>
                
                                <h3 class="text-lg font-semibold">{{ $ukuran->patient->name ?? 'Pasien tidak ditemukan' }}</h3>
                                <p class="text-sm text-gray-600">{{ $ukuran->patient->address ?? 'Alamat tidak ditemukan' }}</p>
                                <p class="text-sm text-gray-600">{{ $ukuran->patient->phone_number ?? 'Nomor HP tidak ditemukan' }}</p>
                             </div>
                            <div class="qr-code" style="width: 30mm; height: auto;">
                                @if($ukuran->registration_number)
                                    {!! $qrCode !!}
                                @else
                                    <p>QR Code tidak tersedia</p>
                                @endif
                            </div>
                        </div>

                        <h4 class="font-bold text-blue-500">Anamnesa</h4>
                        <div class="space-y-2">
                            <div class="bg-gray-50 p-4 rounded-md">
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
                                <table class="w-full max-w-sm col-5 mx-14">
                                    <thead>
                                        <tr class="header-row">
                                            <th class="header-cell">Rx</th>
                                            <th class="header-cell">Sph</th>
                                            <th class="header-cell">Cyl</th>
                                            <th class="header-cell">Axis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                            <div class="bg-gray-100 p-4 rounded">
                                <table class="w-full max-w-sm mx-auto col-12">
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
                                    <tbody>
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
                            </div>
                                <div>
                                    <h4 class="font-bold text-blue-500 mt-6">Refraksi Binokuler</h4>
                                    <div class="bg-gray-100 shadow-md rounded-lg p-6 mt-4">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <h5 class="text-lg font-semibold text-gray-700 mb-2">Keseimbangan Binokuler</h5>
                                                <p class="text-gray-600 bg-white p-3 rounded-md">
                                                    {{ $ukuran->keseimbangan_binokuler ?? 'Tidak ada data' }}
                                                </p>
                                            </div>
                                            <div>
                                                <h5 class="text-lg font-semibold text-gray-700 mb-2">Titik Akhir Binokuler</h5>
                                                <p class="text-gray-600 bg-white p-3 rounded-md">
                                                    {{ $ukuran->titikakhir_binokuler ?? 'Tidak ada data' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-6">
                                            <h5 class="text-lg font-semibold text-gray-700 mb-2">Diagnosa & Kesimpulan</h5>
                                            <p class="text-gray-600 bg-white p-3 rounded-md">
                                                {{ $ukuran->diagnosa ?? 'Tidak ada data' }}
                                            </p>
                                        </div>
                                    </div>

                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <style>
        @media print {
            body * {
                visibility: hidden;
        
            #printable-content, #printable-content * {
                visibility: visible;
            }
            #printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 80mm;
                padding: 5mm;
                font-size: 10pt;
                line-height: 1.2;
                color: #000000 !important; // Memastikan teks hitam pekat
                -webkit-print-color-adjust: exact;
            }
            .bg-gray-50 {
                background-color: #ffffff !important;
                -webkit-print-color-adjust: exact;
            }
            .text-blue-500, .text-gray-600, .text-gray-700 {
                color: #000000 !important; // Mengubah semua teks menjadi hitam pekat
                -webkit-print-color-adjust: exact;
            }
            .font-medium, .font-semibold, .font-bold {
                font-weight: bold !important; // Membuat teks lebih tebal
            }
            .rounded-md {
                border-radius: 0 !important;
            }
            .grid {
                display: block !important;
            }
            .grid-cols-6, .grid-cols-6 {
                display: block !important;
            }
            .gap-4, .gap-x-4 {
                gap: 0 !important;
            }
            .space-y-2 > * + * {
                margin-top: 0.25rem !important;
            }
            .p-4 {
                padding: 0.25rem !important;
            }
            .mb-3 {
                margin-bottom: 0.25rem !important;
            }
            h1, h4 {
                font-size: 12pt !important;
                margin-top: 0.5rem !important;
                margin-bottom: 0.25rem !important;
            }
            .flex {
                display: block !important;
            }
            .flex-col {
                margin-bottom: 0.25rem !important;
            }
            .grid-cols-3 {
                display: grid !important;
                grid-template-columns: repeat(3, 1fr) !important;
            }
            .gap-x-2 {
                column-gap: 0.5rem !important;
            }
            .mt-2 {
                margin-top: 0.5rem !important;
            }
            .flex-col {
                display: flex !important;
                flex-direction: column !important;
            }

            #printable-content .mb-4 {
                margin-bottom: 1rem !important;
            }

            #printable-content h3 {
                font-size: 12pt !important;
                font-weight: bold !important;
                margin-bottom: 0.25rem !important;
                color: #000000 !important; // Memastikan judul hitam pekat
            }

            #printable-content p {
                margin-bottom: 0.125rem !important;
                color: #000000 !important; // Memastikan paragraf hitam pekat
            }

            // Menambahkan gaya untuk mempertebal garis tabel jika ada
            table, th, td {
                border: 1px solid #000000 !important;
                border-collapse: collapse !important;
            }

            .qr-code {
                page-break-inside: avoid;
                width: 40mm; /* Sesuaikan ukuran ini sesuai kebutuhan */
                height: auto;
            }

            .qr-code svg {
                width: 100%;
                height: auto;
            }

            /* Mengubah tata letak untuk membuat sph, cyl, axis, add, prisma, visus berada di samping */
            .grid-cols-6 {
                display: grid !important;
                grid-template-columns: repeat(6, 1fr) !important;
                gap: 0.5rem !important;
            }
            .flex-col {
                display: flex !important;
                flex-direction: row !important;
            }

            /* Menambahkan header untuk Sph, Cyl, Axis, Add, Prisma, Visus */
            .header-row {
                border-bottom: 2px solid #000000 !important;
            }
            .header-cell {
                font-weight: bold !important;
                padding-bottom: 0.25rem !important;
            }
        }
    </style> --}}
</x-app-layout>