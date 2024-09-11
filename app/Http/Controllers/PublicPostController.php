<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('cases_view.index', compact('posts'));
    }

    public function show($id)
 {
    $post = Post::findOrFail($id);
    return view('cases_view.show', compact('post'));
 }

}
