<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\TempatMakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->pluck('warungmakan_id')->toArray();

        // Ambil data bookmark
        $tempatMakan = TempatMakan::whereIn('id', $bookmarks)->get();

        return view('my_bookmark', ['tempatMakan' => $tempatMakan]);
    }

    public function store(Request $request)
    {
        $route = route('index') . '#culinary-places';
        // cek jika belum ada maka tambah, jika sudah ada maka remove
        $bookmarked = Bookmark::where('user_id', Auth::user()->id)->where('warungmakan_id', $request->warungmakan_id)->first();
        if (!$bookmarked) {
            $bookmark = new Bookmark();
            $bookmark->user_id = Auth::user()->id;
            $bookmark->warungmakan_id = $request->warungmakan_id;
            $bookmark->save();
            return redirect()->to($route)->with('success', 'Berhasil melakukan bookmark');
        } else {
            $bookmarked->delete();
            return redirect()->to($route)->with('success', 'Berhasil menghapus bookmark');
        }

    }
}
