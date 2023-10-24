@extends('layouts.components')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('post.create')}}" class="btn btn-primary mb-3 ">Add one</a>
        </div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show',$post->id)}}">{{$post->id}}.{{$post->title}}</a></div>
        @endforeach
    </div>

@endsection
