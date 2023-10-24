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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
