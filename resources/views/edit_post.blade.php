@extends('layouts.components')
@section('content')
    <div class="container">
        <form action="{{route('post.update',$post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content" placeholder="Content">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="is_published" class="form-label">is_published</label>
                <input type="text" name="is_published" class="form-control" id="is_published" value="{{$post->is_published}}" placeholder="is_published">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option
                                {{$category->id===$post->category->id ? 'selected':''}}

                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags">Tags</label>
                <select class="form-select" multiple id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        {{$category->id===$post->category->id ? 'selected':''}}
                        <option
                            @foreach($post->tags as $postTag)
                                {{$tag->id===$postTag->id ? 'selected':''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
