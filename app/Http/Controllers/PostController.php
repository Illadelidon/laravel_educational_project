<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $data=Post::all();
        //$category = Category::find(1);
        //$post = Post::find(1);
        //$tag = Tag::find(1);
        //dd($tag->posts);

        return view('index',['posts'=>$data]);

    }

    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('create_post',['categories'=>$categories],['tags'=>$tags]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'is_published' => 'integer',
            'category_id'=>'',
            'tags'=>''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post=Post::create($data);

        $post->tags()->attach($tags);



        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('show_posts', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        //return view('edit_post', ['post' => $post],['categories'=>$categories],['tags'=>$tags]);
        return view('edit_post',compact('post','categories','tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'is_published' => 'integer',
            'category_id'=>'',
            'tags'=>''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
