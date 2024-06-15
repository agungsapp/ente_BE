<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatMakan;

class TempatMakanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel kuliner
        $tempatMakan = TempatMakan::get();
        $lokasiMakan = TempatMakan::select('location')->distinct()->get();

        $foodType = TempatMakan::select('type')->distinct()->get();

        // Mengembalikan view index dengan data tempat makan
        return view('index', ['tempatMakan' => $tempatMakan, 'lokasiMakan' => $lokasiMakan, 'foodType' => $foodType]);
    }

    public function details($id)
    {
        // Mengambil semua data dari tabel kuliner dengan id tertentu
        $detailTempatMakan = TempatMakan::find($id);

        // Mengembalikan view details dengan data detail tempat makan
        return view('details', compact('detailTempatMakan', 'id'));
    }

    public function filterByLocation(Request $request)
    {
        $location = $request->input('location');
        $filteredTempatMakan = TempatMakan::where('location', $location)->get();
        
        // Load the view with filtered data
        $view = view('filtered_data')->with('filteredTempatMakan', $filteredTempatMakan)->render();

        return response()->json(['html' => $view]);
    }

    //tes
    public function filterByFoodType(Request $request)
    {
        $type = $request->input('type');
        $filteredTempatMakan = TempatMakan::where('type', $type)->get();
        
        // Load view with filtered data
        $view = view('filtered_data')->with('filteredTempatMakan', $filteredTempatMakan)->render();

        return response()->json(['html' => $view]);
    }
}