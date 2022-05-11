@extends('layouts.master')

@section('base.title', 'Isi Data')
@section('master.title', 'Isi Data')

{{-- @section('master.content')
    <div class="px-96 py-8 border-2 border-black">
        <form action="{{ route('journey.tambahkan') }}" method="POST">
            @csrf
            <div class="flex items-center justify-between mb-4">
                <label for="tanggal">Tanggal</label>
                <input class="w-[250px] border-2 border-black" id="tanggal" name="tanggal" type="date">
            </div>
            <div class="flex items-center justify-between mb-4">
                <label for="waktu">Jam</label>
                <input class="w-[250px] border-2 border-black" id="waktu" name="waktu" type="time">
            </div>
            <div class="flex items-center justify-between mb-4">
                <label for="lokasi">Lokasi yang dikunjungi</label>
                <input class="w-[250px] border-2 border-black" id="lokasi" name="lokasi" type="text">
            </div>
            <div class="flex items-center justify-between">
                <label for="suhu_tubuh">Suhu Tubuh</label>
                <input class="w-[250px] border-2 border-black" id="suhu_tubuh" name="suhu_tubuh" type="number">
            </div>
            <div class="flex justify-end mt-4">
                <button class="px-2 border-2 border-black shadow-sm shadow-black" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection --}}

@section('master.content')
    <form action="{{ route('journey.tambahkan') }}" method="POST">
        @if ($errors->any())
            @include('components.error-alert', ['headline' => 'Kesalahan data'])
        @endif
        @csrf
        <div class="w-full p-4 rounded bg-white shadow-md">
            <div class="lg:flex items-center justify-center lg:mb-10">
                <div class="lg:w-[119px] lg:flex items-center justify-end">
                    <label class="block lg:mr-6 font-semibold text-tuna" for="tanggal">Tanggal</label>
                </div>
                <input
                    class="w-full lg:w-80 lg:py-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="date" name="tanggal" id="tanggal">
            </div>
            <div class="lg:flex items-center justify-center lg:mb-10">
                <div class="lg:w-[119px] lg:flex items-center justify-end">
                    <label class="block lg:mr-6 font-semibold text-tuna" for="waktu">Jam</label>
                </div>
                <input
                    class="w-full lg:w-80 lg:py-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="time" name="waktu" id="waktu">
            </div>
            <div class="lg:flex items-center justify-center lg:mb-10">
                <div class="lg:w-[119px] lg:flex items-center justify-end">
                    <label class="block lg:mr-6 font-semibold text-tuna" for="lokasi">Lokasi</label>
                </div>
                <input
                    class="w-full lg:w-80 lg:py-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="text" placeholder="Masukan lokasi perjalanan" name="lokasi" id="lokasi">
            </div>
            <div class="lg:flex items-center justify-center">
                <div class="lg:w-[119px] lg:flex items-center justify-end">
                    <label class="block lg:mr-6 font-semibold text-tuna" for="suhu_tubuh">Suhu tubuh</label>
                </div>
                <input
                    class="w-full lg:w-80 lg:py-4 border-2 text-tuna border-stone-300 focus:border-green-700 focus:shadow-outline rounded"
                    type="number" placeholder="Masukan suhu tubuh" name="suhu_tubuh" id="suhu_tubuh">
            </div>
        </div>
        <div class="w-full mt-6 lg:flex justify-end">
            <button
                class="w-full lg:w-auto lg:px-28 py-4 rounded bg-green-700 text-center hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 text-white font-semibold">Simpan</button>
        </div>
    </form>
@endsection
