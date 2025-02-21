<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
class HomeController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function show()
    {
        // Fetch posts by category
        $agenda = Posts::where('kategori_id', 4)->where('status', 1)->get();
        $kegiatan = Posts::where('kategori_id', 1)->where('status', 1)->get();
        $prestasi = Posts::where('kategori_id', 3)->where('status', 1)->get();

        return view('homepage.index', compact('agenda', 'kegiatan', 'prestasi'));
    }
}
