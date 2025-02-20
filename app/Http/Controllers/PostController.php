<?php

namespace App\Http\Controllers;

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
}
