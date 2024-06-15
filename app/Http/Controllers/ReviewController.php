<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsRating;

class ReviewController extends Controller
{
    public function saveRating(Request $request) {
        // Validasi data yang diterima dari formulir
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi berhasil, simpan data ke dalam tabel
        $productRating = new ProductsRating;
        $productRating->warungmakan_id = $request->warungmakan_id;
        $productRating->name = $request->name;
        $productRating->rating = $request->rating;
        $productRating->review = $request->review;
        $productRating->save();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->back()->with('success', 'Review has been saved successfully!');

    }
}
