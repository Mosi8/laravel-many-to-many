@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1 class="mt-3">{{$post->title}}</h1>
  <p class="my-1">{{$post->content}}</p>
  <p>
    @foreach ($post->tags as $tag)
      {{$tag->name}}
    @endforeach
  </p>
  <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="mb-3">
      @csrf
      @method("DELETE")
      <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro?')"><i class="fa-solid fa-trash-can"></i></button>
  </form>
  <a href="{{route('admin.posts.index')}}"><button type="button" class="btn btn-dark">Back</button></a>
</div>
@endsection

