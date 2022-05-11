@extends('layouts.base')

{{-- @section('base.content')
    <header class="h-60 p-4 flex">
        <img class="h-full" src="{{ asset('images/logo-perjalanan.png') }}" alt="Logo perjalanan">
        <div class="flex flex-col justify-evenly">
            <h1 class="uppercase font-bold text-4xl">Peduli Diri</h1>
            <nav>
                <p>@yield('master.title')</p>
                <ul class="flex">
                    <li class="mr-2">
                        @if (Route::current()->getName() === 'page.home')
                            <a class="hover:text-blue-600 hover:underline" href="{{ route('page.home') }}">Home</a>
                        @else
                            <a class="text-blue-600 underline" href="{{ route('page.home') }}">Home</a>
                        @endif
                    </li>
                    |
                    <li class="mx-2">
                        @if (Route::current()->getName() === 'page.catatan-perjalanan')
                            <a class="hover:text-blue-600 hover:underline" href="{{ route('page.catatan-perjalanan') }}">Catatan Perjalanan</a>
                        @else
                            <a class="text-blue-600 underline" href="{{ route('page.catatan-perjalanan') }}">Catatan Perjalanan</a>
                        @endif
                    </li>
                    |
                    <li class="mx-2">
                        @if (Route::current()->getName() === 'page.tambah-catatan-perjalanan')
                            <a class="hover:text-blue-600 hover:underline" href="{{ route('page.tambah-catatan-perjalanan') }}">Isi Data</a>
                        @else
                            <a class="text-blue-600 underline" href="{{ route('page.tambah-catatan-perjalanan') }}">Isi Data</a>
                        @endif
                    </li>
                    |
                    <li class="ml-2">
                        <a class="px-2 border-2 border-black shadow-sm shadow-black" href="{{ route('auth.logout') }}">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="mx-[200px]">
        @yield('master.content')
    </main>
@endsection --}}

@section('base.content')
    <div class="w-screen h-screen py-8 px-4 bg-[#F1F1F1]">
        <header class="flex items-center justify-center lg:justify-start lg:mb-10">
            <img class="w-28 lg:w-56" src="{{ asset('images/logo-perjalanan.png') }}" alt="Logo Peduli Diri">
            <h1 class="mr-4 text-4xl text-tuna lg:hidden">Peduli Diri</h1>
            <div class="hidden lg:block w-full">
                <h1 class="text-5xl text-tuna mb-12">Peduli Diri</h1>
                <nav class="w-full flex justify-between pr-48">
                    <ul class="flex">
                        <li class="mr-9">
                            <a class="font-semibold text-green-700 hover:underline"
                                href="{{ route('page.home') }}">Home</a>
                        </li>
                        <li class="mr-9">
                            <a class="font-semibold text-green-700 hover:underline"
                                href="{{ route('page.catatan-perjalanan') }}">Catatan perjalanan</a>
                        </li>
                        <li>
                            <a class="font-semibold text-green-700 hover:underline"
                                href="{{ route('page.tambah-catatan-perjalanan') }}">Isi data</a>
                        </li>
                    </ul>
                    <a class="font-semibold text-red-700 hover:underline" href="{{ route('auth.logout') }}">Keluar</a>
                </nav>
            </div>
        </header>
        <div class="w-full flex flex-col my-10 lg:hidden">
            <button class="w-full flex justify-center mb-4" id="dropdown-btn">
                <svg id="dropdown-icon-up" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-green-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                <svg id="dropdown-icon-down" xmlns="http://www.w3.org/2000/svg" class="hidden h-6 w-6 stroke-green-700"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </button>
            <nav class="hidden" id="dropdown-nav">
                <ul>
                    <li class="py-3">
                        <a class="block font-semibold text-green-700" href="{{ route('page.home') }}">Home</a>
                    </li>
                    <li class="py-3">
                        <a class="block font-semibold text-green-700"
                            href="{{ route('page.catatan-perjalanan') }}">Catatan perjalanan</a>
                    </li>
                    <li class="py-3">
                        <a class="block font-semibold text-green-700"
                            href="{{ route('page.tambah-catatan-perjalanan') }}">Isi data</a>
                    </li>
                    <li class="py-3">
                        <a class="block font-semibold text-red-700" href="{{ route('auth.logout') }}">Keluar</a>
                    </li>
                </ul>
            </nav>
        </div>
        <main class="lg:pr-48 lg:pl-[224px]">
            @yield('master.content')
        </main>

    </div>
@endsection
