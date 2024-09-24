<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Detail Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">{{ $patient->name }}</h3>
                    <p><strong>Alamat:</strong> {{ $patient->address }}</p>
                    <p><strong>Nomor Telepon:</strong> {{ $patient->phone_number }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $patient->date_of_birth ? $patient->date_of_birth->format('d/m/Y') : 'Tidak ada data' }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ ucfirst($patient->gender) ?? 'Tidak ada data' }}</p>
                    <p><strong>Pekerjaan:</strong> {{ $patient->occupation ?? 'Tidak ada data' }}</p>

                    <h4 class="text-lg font-semibold mt-6 mb-2">Riwayat Pemeriksaan</h4>
                    @if($patient->ukurans->isNotEmpty())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Registrasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($patient->ukurans as $ukuran)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ukuran->registration_number }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ukuran->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            R: {{ $ukuran->right_sph ?? '-' }}/{{ $ukuran->right_cyl ?? '-' }}/{{ $ukuran->right_axis ?? '-' }}
                                            L: {{ $ukuran->left_sph ?? '-' }}/{{ $ukuran->left_cyl ?? '-' }}/{{ $ukuran->left_axis ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('ukurans.show', $ukuran) }}" class="text-indigo-600 hover:text-indigo-900">Lihat Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Belum ada riwayat pemeriksaan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>