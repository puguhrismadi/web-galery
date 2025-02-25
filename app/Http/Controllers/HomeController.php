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
        // Fetch posts by category 1: kegiatan sekolah, 2 : info sekolah, 3 : prestasi, 4 : agenda
        $kegiatan = Posts::where('kategori_id', 1)->where('status', 1)->get();
        $info = Posts::where('kategori_id', 2)->where('status', 1)->get();
        $prestasi = Posts::where('kategori_id', 3)->where('status', 1)->get();
        $agenda = Posts::where('kategori_id', 4)->where('status', 1)->get();
        $peta = Posts::where('kategori_id', 5)->where('status', 1)->get();
        return view('homepage.index', compact('info','agenda', 'kegiatan', 'prestasi','peta'));
    }
}
