@extends('layouts.components')
@section('content')
    <div class="container">
<form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input

            value="{{old('title')}}"

            type="text" name="title" class="form-control" id="title" placeholder="Title">

        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">

        <label for="content" class="form-label">Content</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content" >{{old('content')}}</textarea>
        @error('content')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="is_published" class="form-label">is_published</label>
        <input type="text" name="is_published" class="form-control" id="is_published" placeholder="is_published">
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select id="category" class="form-select" name="category_id">
            @foreach($categories as $category)
            <option
                {{old('category_id')==$category->id ? 'selected':''}}


                value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="tags">Tags</label>
    <select class="form-select" multiple id="tags" name="tags[]">
        @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
    </select>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
    </div>
@endsection
