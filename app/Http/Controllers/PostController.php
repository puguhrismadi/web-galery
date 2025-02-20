<?php

namespace App\Http\Controllers;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\View\View;
//add storage facade
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() : View
    {
        //get all posts galery
        $gallery = Posts::latest()->paginate(5);
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
    public function show(string $id): View
    {
        //get gallery by ID
        $gallery = Posts::findOrFail($id);

        //render view with gallery view
        return view('posts.show', compact('gallery'));
    }
    public function edit(string $id): View
    {
        //get product by ID
        $gallery = Posts::findOrFail($id);

        //render view with product
        return view('posts.edit', compact('gallery'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'judul' => 'required|min:5',
            'kategori_id' => 'required|numeric|min:1',
            'isi' => 'required|min:10',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'petugas_id' => 'required|numeric|min:1',
        ]);

        //get gallery by ID
        $post = Posts::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $image = $request->file('gambar');
           // Simpan gambar ke storage 'public/posts'
            $gambarPath = $request->file('gambar')->store('posts', 'public');

            //delete old image
            Storage::delete('public/'.$post->gambar);

            //update product with new image
            $post->update([
                'gambar'         => $gambarPath,
                'kategori_id'    => $request->kategori_id,
                'judul'         => $request->judul,
                'isi'   => $request->isi,
                'petugas_id'         => $request->petugas_id
                
            ]);

        } else {

            //update product without image
            $post->update([
            'kategori_id'   => $request->kategori_id,
            'judul'         => $request->judul,
            'isi'   => $request->isi,
            'petugas_id'         => $request->petugas_id
            ]);
        }

        //redirect to index
        return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get gallery by ID
        $gallery =Posts::findOrFail($id);

        //delete image
        Storage::delete('public//'. $gallery->gambar);

        //delete product
        $gallery->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
