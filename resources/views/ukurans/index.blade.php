<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200 ">
            {{ __('Daftar Ukuran Pemeriksaan') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('patients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Pasien Baru
                        </a>
                    </div>
                    <form action="{{ route('ukurans.index') }}" method="GET" class="flex-grow mr-4">
                        <div class="flex">
                            <input type="text" name="search" placeholder="Cari nama pasien..." value="{{ request('search') }}" class="flex-grow px-3 py-2 text-sm border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 text-sm rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Cari</button>
                        </div>
                        @if($ukurans->isEmpty())
                            <div class="mt-4 text-red-500">Data tidak ada</div>
                        @endif
                    </form>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100 ">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Registrasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. HP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ukurans as $ukuran)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-xs text-gray-500">{{ $ukuran->registration_number }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $ukuran->patient->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $ukuran->patient->phone_number }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500 whitespace-pre-line">
                                            R: S{{ $ukuran->right_sph ?? '-' }} C{{ $ukuran->right_cyl ?? '-' }} X {{ $ukuran->right_axis ?? '-' }} Add {{ $ukuran->right_add ?? '-' }} <br>
                                            L: S{{ $ukuran->left_sph ?? '-' }} C {{ $ukuran->left_cyl ?? '-' }} X {{ $ukuran->left_axis ?? '-' }} Add  {{ $ukuran->left_add ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-4 whitespace-nowrap  text-sm font-medium">
                                        <a href="{{ route('ukurans.show', $ukuran) }}" class="text-indigo-600 hover:text-indigo-900">Lihat Detil</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="mt-4">
                        {{ $ukurans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
