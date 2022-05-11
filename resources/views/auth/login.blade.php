@extends('layouts.base')

@section('base.title', 'Login')

{{-- @section('base.content')
    <div class="h-screen flex items-center justify-center">
        <form class="flex flex-col" action="{{ route('auth.login-user') }}" method="POST">
            @csrf
            @if (Session::has('error'))
            <div class="mb-4 border-2 border-black bg-red-600">
                <p class="text-white">!!! {{ Session::get('error') }} !!!</p>
            </div>
            @endif
            <input class="px-2 border-2 border-black mb-4" name="nik" type="text" placeholder="NIK">
            <input class="px-2 border-2 border-black mb-4" name="fullname" type="text" placeholder="Nama Lengkap">
            <div class="flex justify-between">
                <a class="px-2 border-2 border-black shadow-sm shadow-black" href="{{ route('auth.register') }}">Saya Pengguna Baru</a>
                <button class="px-2 border-2 border-black shadow-sm shadow-black">Masuk</button>
            </div>
        </form>
    </div>
@endsection --}}

@section('base.content')
    <div class="flex items-center justify-center w-screen h-screen sm:bg-gray-100">
        <div class="px-4">
            <h1 class="text-3xl sm:ml-7 text-tuna">Masuk Peduli Diri</h1>
            <div class="mt-9 sm:bg-white sm:px-7 sm:py-9 sm:shadow-md">
                <form action="{{ route('auth.login-user') }}" method="POST">
                    @if ($errors->any())
                        @include('components.error-alert')
                    @endif
                    @csrf
                    <div class="mb-4 sm:mb-8 sm:w-[514px] ">
                        <label class="font-semibold text-tuna" for="nik">NIK</label>
                        <input
                            class="w-full py-4 border-2 border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                            autocomplete="off" type="text" id="nik" name="nik" placeholder="Masukan NIK anda">
                    </div>
                    <div class="mb-10 sm:mb-12 sm:w-[514px]">
                        <label class="font-semibold text-tuna" for="fullname">Nama lengkap</label>
                        <input
                            class="w-full py-4 border-2 border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                            autocomplete="off" type="text" id="fullname" name="fullname"
                            placeholder="Masukan Nama lengkap anda">
                    </div>
                    <div class="sm:hidden">
                        <button
                            class="w-full py-4 rounded bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold">Masuk</button>
                        <span class="block mt-8 mb-6 text-center text-tuna">Atau</span>
                        <a class="block text-center text-green-700 hover:underline"
                            href="{{ route('auth.register') }}">pengguna baru</a>
                    </div>
                    <div class="hidden sm:flex items-center justify-between">
                        <a class="text-green-700 hover:underline" href="{{ route('auth.register') }}">Saya pengguna
                            baru</a>
                        <button
                            class="py-4 px-14 rounded bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
