<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Journey;
use App\Http\Requests\JourneyStoreRequest;

class JourneyController extends Controller
{
    public function urutkan(Request $request) {
        $sq = null;

        $searchSelect = $request->search_select;
        if ($searchSelect === 'lokasi') {
            $sq = $request->lokasi;
        } elseif ($searchSelect === 'tanggal') {
            $sq = $request->tanggal;
        } elseif ($searchSelect === 'jam') {
            $sq = $request->jam;
        } elseif ($searchSelect === 'suhu_tubuh') {
            $sq = $request->suhu_tubuh;
        }

        return redirect()->route('page.catatan-perjalanan', ['query_type' => $searchSelect, 'search_query' => $sq]);
    }

    public function tambahkan(JourneyStoreRequest $request) {
        $validated = $request->validated();

        $waktu = Carbon::parse($validated['waktu'])->format('H:i:s');

        Auth::user()->hasMany(Journey::class)->create([
            'tanggal' => $validated['tanggal'],
            'waktu' => $waktu,
            'lokasi' => $validated['lokasi'],
            'suhu_tubuh' => $validated['suhu_tubuh']
        ]);

        return redirect()->route('page.catatan-perjalanan');
    }
}
