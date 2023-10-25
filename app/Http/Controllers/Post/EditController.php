<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        //return view('edit_post', ['post' => $post],['categories'=>$categories],['tags'=>$tags]);
        return view('edit_post',compact('post','categories','tags'));
    }
}
