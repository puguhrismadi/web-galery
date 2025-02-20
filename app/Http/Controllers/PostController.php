<?php

namespace App\Http\Controllers;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\View\View;
class PostController extends Controller
{
    public function index() : View
    {
        //get all posts galery
        $gallery = Posts::latest()->paginate(10);
        //render view with gallery
        return view('posts.index', compact('gallery'));
    }
    public function create() : View
    {
        return view('posts.create');
    }
    /**
     * Store a newly created post in the database.
     *
     * This method validates the incoming request data, creates a new post
     * entry in the database using the validated data, and then redirects
     * the user to the posts index page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request) : RedirectResponse
    {
        //validate form
        //dd($request->post());
        $request->validate([
            'judul' => 'required|min:5',
            'kategori_id' => 'required|numeric|min:1',
            'isi' => 'required|min:10',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'petugas_id' => 'required|numeric|min:1',
            
        ]);
      
      // Upload gambar dengan penyimpanan yang benar
      if ($request->hasFile('gambar')) {
        // Simpan gambar ke storage 'public/posts'
        $gambarPath = $request->file('gambar')->store('posts', 'public');
        } else {
            return redirect()->back()->withErrors(['gambar' => 'Gambar wajib diupload']);
        }

        //insert data to database
        Posts::create([
            'judul' => request('judul'),
            'kategori_id' => request('kategori_id'),
            'isi' => request('isi'),
            'gambar' => $gambarPath, // Simpan path gambar,
            'petugas_id' => request('petugas_id'),
            'status' => request('status'),
        ]);
        //redirect to index
        return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
