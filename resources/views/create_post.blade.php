@extends('layouts.components')
@section('content')
    <div class="container">
<form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content" ></textarea>
    </div>
    <div class="mb-3">
        <label for="is_published" class="form-label">is_published</label>
        <input type="text" name="is_published" class="form-control" id="is_published" placeholder="is_published">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
    </div>
@endsection
