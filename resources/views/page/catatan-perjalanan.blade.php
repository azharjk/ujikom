@extends('layouts.master')

@section('base.title', 'Catatan Perjalanan')
@section('master.title', 'Catatan Perjalanan')
{{-- @section('master.content')
    <form class="flex p-4 border-2 border-black" action="{{ route('journey.urutkan') }}" method="POST">
        @csrf
        <div>
            <label class="mr-6" for="tanggal">Urutkan Berdasarkan</label>
            <input class="mr-6 border-2 border-black" name="tanggal" value="{{ $tanggal ?? '' }}" id="tanggal" type="date">
        </div>
        <button type="submit" class="mr-6 px-2 border-2 border-black shadow-sm shadow-black">Urutkan</button>

        @if (Route::current()->getName() === 'journey.urutkan')
            <a class="px-2 border-2 border-black shadow-sm shadow-black"
                href="{{ route('page.catatan-perjalanan') }}">Kembali</a>
        @endif
    </form>
    <div class="p-8 mt-4 border-2 border-black">
        <table class="w-full border-2 border-black">
            <thead class="table w-full table-fixed">
                <tr class="bg-gray-400">
                    <th class="text-left font-normal">Tanggal</th>
                    <th class="text-left font-normal">Waktu</th>
                    <th class="text-left font-normal">Lokasi</th>
                    <th class="text-left font-normal">Suhu Tubuh</th>
                </tr>
            </thead>
            <tbody class="block h-[79px] overflow-y-scroll">
                @foreach ($journies as $journey)
                    <tr class="odd:bg-gray-200 table w-full table-fixed">
                        <td>{{ $journey->tanggal }}</td>
                        <td>{{  \Carbon\Carbon::createFromFormat('H:i:s', $journey->waktu)->format('H:i') }}</td>
                        <td>{{ $journey->lokasi }}</td>
                        <td>{{ $journey->suhu_tubuh }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end mt-4">
            <a class="px-2 border-2 border-black shadow-sm shadow-black"
                href="{{ route('page.tambah-catatan-perjalanan') }}">Isi Catatan Perjalanan</a>
        </div>
    </div>
@endsection --}}

@section('master.content')
    <div class="w-full p-4 rounded bg-white shadow-md">
        <form class="w-full xl:flex items-center justify-between" action="{{ route('journey.urutkan') }}" method="POST">
            @csrf
            <div class="mb-9 xl:flex xl:mb-0">
                <select
                    class="mr-4 mb-2 xl:mb-0 w-full border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    name="search_select" id="search-select">
                    <option @if (request()->query('query_type') === 'tanggal') selected @endif value="tanggal">Tanggal</option>
                    <option @if (request()->query('query_type') === 'lokasi') selected @endif value="lokasi">Lokasi</option>
                    <option @if (request()->query('query_type') === 'jam') selected @endif value="jam">Jam</option>
                    <option @if (request()->query('query_type') === 'suhu_tubuh') selected @endif value="suhu_tubuh">Suhu tubuh</option>
                </select>
                <input value="{{ $search_query ?? '' }}"
                    class="@if (request()->query('query_type') !== 'tanggal' && request()->query('query_type') !== null) hidden @endif w-full xl:mr-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="date" name="tanggal" id="tanggal">
                <input value="{{ $search_query ?? '' }}"
                    class="@if (request()->query('query_type') !== 'lokasi') hidden @endif w-full xl:mr-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="text" name="lokasi" id="lokasi" placeholder="Cari lokasi">
                <input value="{{ $search_query ?? '' }}"
                    class="@if (request()->query('query_type') !== 'jam') hidden @endif w-full xl:mr-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="time" name="jam" id="jam">
                <input value="{{ $search_query ?? '' }}"
                    class="@if (request()->query('query_type') !== 'suhu_tubuh') hidden @endif w-full xl:mr-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="number" name="suhu_tubuh" id="suhu_tubuh">
                <button type="submit"
                    class="hidden xl:block py-2 px-7 rounded bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold">Cari</button>

            </div>
            <div class="flex justify-between items-center">
                <button type="submit"
                    class="xl:hidden py-2 px-7 rounded bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold">Cari</button>
                <a class="py-2 px-5 border-2 border-stone-300 rounded bg-white font-semibold text-tuna focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-200"
                    href="{{ route('page.catatan-perjalanan') }}">Bersihkan</a>
            </div>
        </form>
    </div>
    <div class="w-full mt-5 rounded bg-white shadow-md">
        <table class="w-full">
            <thead>
                <tr class="border-b-[0.5px] border-[#A4A4A4]">
                    <th class="text-left text-xs font-normal uppercase text-[#4B5563] py-6 pl-6">
                        <div class="flex justify-between items-center">
                            <span>Tanggal</span>
                            <span class="mr-4">
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'descending',
                                        'field' => 'tanggal',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                    </svg>
                                </a>
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'ascending',
                                        'field' => 'tanggal',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </th>
                    <th class="text-left text-xs font-normal uppercase text-[#4B5563] py-6">
                        <div class="flex justify-between items-center">
                            <span>Waktu</span>
                            <span class="mr-4">
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'descending',
                                        'field' => 'waktu',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                    </svg>
                                </a>
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'ascending',
                                        'field' => 'waktu',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </th>
                    <th class="text-left text-xs font-normal uppercase text-[#4B5563] py-6">
                        <div class="flex justify-between items-center">
                            <span>Lokasi</span>
                            <span class="mr-4">
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'descending',
                                        'field' => 'lokasi',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                    </svg>
                                </a>
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'ascending',
                                        'field' => 'lokasi',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </th>
                    <th class="text-left text-xs font-normal uppercase text-[#4B5563] py-6">
                        <div class="flex justify-between items-center">
                            <span>Suhu Tubuh</span>
                            <span class="mr-4">
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'descending',
                                        'field' => 'suhu_tubuh',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                    </svg>
                                </a>
                                <a
                                    href="{{ route('page.catatan-perjalanan', [
                                        'search_query' => request()->query('search_query'),
                                        'query_type' => request()->query('query_type'),
                                        'mode' => 'ascending',
                                        'field' => 'suhu_tubuh',
                                    ]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($journeys as $journey)
                    <tr class="border-b-[0.5px] border-[#A4A4A4]">
                        <td class="pt-4 pb-3 pl-6 text-tuna">{{ $journey->tanggal }}</td>
                        <td class="pt-4 pb-3 text-tuna">
                            {{ \Carbon\Carbon::parse($journey->waktu)->format('h:i A') }}</td>
                        <td class="pt-4 pb-3 text-tuna">{{ $journey->lokasi }}</td>
                        <td class="pt-4 pb-3 text-tuna">{{ $journey->suhu_tubuh }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $journeys->links('pagination::tailwind') }}
        </div>
    </div>
    <div class="mt-6 lg:flex justify-end">
        <a class="block lg:px-14 py-4 rounded bg-green-700 text-center hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold"
            href="{{ route('page.tambah-catatan-perjalanan') }}">Isi catatan perjalanan</a>
    </div>

    <script>
        const addHiddenClass = (arr) => {
            arr.forEach((e) => {
                e.classList.add('hidden');
            });
        }

        const app = () => {
            const searchSelect = document.getElementById('search-select');

            const tanggalField = document.getElementById('tanggal');
            const lokasiField = document.getElementById('lokasi');
            const jamField = document.getElementById('jam');
            const suhuField = document.getElementById('suhu_tubuh');

            if (!searchSelect) return;

            searchSelect.addEventListener('change', () => {
                if (searchSelect.value === 'tanggal') {
                    tanggalField.classList.remove('hidden');

                    addHiddenClass([lokasiField, jamField, suhuField]);
                } else if (searchSelect.value === 'lokasi') {
                    lokasiField.classList.remove('hidden');

                    addHiddenClass([tanggalField, jamField, suhuField]);
                } else if (searchSelect.value === 'jam') {
                    jamField.classList.remove('hidden');

                    addHiddenClass([tanggalField, lokasiField, suhuField]);
                } else if (searchSelect.value === 'suhu_tubuh') {
                    suhuField.classList.remove('hidden');

                    addHiddenClass([tanggalField, lokasiField, jamField]);
                }
            });
        }

        app();
    </script>
@endsection
