<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        //$data=Post::all();
        //$category = Category::find(1);
        $post = Post::find(1);
        $tag = Tag::find(1);
        dd($tag->posts);

        //return view('index',['posts'=>$data]);

    }

    public function create()
    {
        return view('create_post');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'is_published' => 'integer',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('show_posts', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('edit_post', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'is_published' => 'integer',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
