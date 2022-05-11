<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home() {
        return view('page.home');
    }

    public function catatanPerjalanan(Request $request)
    {
        $searchType = $request->query('query_type');
        $searchQuery = $request->query('search_query');

        $query = Auth::user()->journeys();

        if ($searchQuery && $searchType) {
            if ($searchType === 'tanggal') {
                $query = $query->whereDate('tanggal', $searchQuery);
            } elseif ($searchType === 'lokasi') {
                $query = $query->where('lokasi', 'like', '%' . $searchQuery . '%');
            } elseif ($searchType === 'suhu_tubuh') {
                $query = $query->where('suhu_tubuh', $searchQuery);
            } elseif ($searchType === 'jam') {
                $query = $query->whereTime('waktu', Carbon::parse($searchQuery));
            }
        }

        $sortMode = $request->query('mode');
        $field = $request->query('field');

        if ($sortMode && $field) {
            if ($sortMode === 'ascending') {
                $query = $query->orderBy($field, 'ASC');
            } elseif ($sortMode === 'descending') {
                $query = $query->orderBy($field, 'DESC');
            }
        }

        return view('page.catatan-perjalanan', ['journeys' => $query->paginate(5), 'search_query' => $searchQuery]);
    }

    public function tambahCatatanPerjalanan() {
        return view('page.tambah-catatan-perjalanan');
    }
}
