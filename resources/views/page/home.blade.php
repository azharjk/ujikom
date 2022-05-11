@extends('layouts.master')

@section('base.title', 'Home')
@section('master.title', 'Home')

{{-- @section('master.content')
    <div>
        <div class="h-40 p-4 mb-4 border-2 border-black">
            <p>Selamat Datang {{ Auth::user()->fullname }} di website peduli diri</p>
        </div>
        <div class="flex justify-end">
            <a class="px-2 border-2 border-black shadow-sm shadow-black" href="{{ route('page.tambah-catatan-perjalanan') }}">Isi Catatan Perjalanan</a>
        </div>
    </div>
@endsection --}}

@section('master.content')
    <div class="w-full h-52 p-4 bg-white rounded shadow-md">
        <p>Selamat datang {{ Auth::user()->fullname }} di website Peduli Diri</p>
    </div>
    <div class="mt-6 lg:flex justify-end">
        <a class="block lg:px-14 py-4 rounded bg-green-700 text-center hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold" href="{{ route('page.tambah-catatan-perjalanan') }}">Isi catatan perjalanan</a>
    </div>
@endsection
