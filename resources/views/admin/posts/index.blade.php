@extends('layouts.app')

@section('content')
<a href="{{route('admin.posts.create')}}" class="d-inline-block m-3"><button type="button" class="btn btn-warning">Crea Post</button></a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Categoria</th>
        <th scope="col">Tag</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->category? $post->category->name : '-'}}</td>
            <td>
              @foreach ($post->tags as $tag)
                  {{$tag->name}}
              @endforeach
            </td>
            <td>
              <a href="{{route('admin.posts.show', $post->id)}}"><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
              <a href="{{route('admin.posts.edit', $post->id)}}" class="d-inline-block"><button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button></a>                    
              <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline-block">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro?')"><i class="fa-solid fa-trash-can"></i></button>
              </form>  
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

