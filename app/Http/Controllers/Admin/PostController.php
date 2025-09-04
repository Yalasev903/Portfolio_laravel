<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.create', [
            'categories' => $categories
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Обновляем валидацию, чтобы не было ограничений на длину текста
    $request->validate([
        'title' => 'required|string|max:255',
        'text' => 'required|string',  // Убираем ограничение по длине
        'img' => 'nullable|string',
        'cat_id' => 'required|exists:categories,id',
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->img = $request->img;
    $post->text = $request->text;
    $post->cat_id = $request->cat_id;
    $post->save();

    return redirect()->back()->withSuccess('Кейс успішно додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    // Обновляем валидацию, чтобы не было ограничений на длину текста
    $request->validate([
        'title' => 'required|string|max:255',
        'text' => 'required|string',  // Убираем ограничение по длине
        'img' => 'nullable|string',
        'cat_id' => 'required|exists:categories,id',
    ]);

    $post->title = $request->title;
    $post->img = $request->img;
    $post->text = $request->text;
    $post->cat_id = $request->cat_id;
    $post->save();

    return redirect()->back()->withSuccess('Кейс успішно змінено!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->withSuccess('Кейс видалено!');
    }
}
