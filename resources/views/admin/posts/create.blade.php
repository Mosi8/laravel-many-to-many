@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h1>Aggiungi Post</h1> 

  <form action="{{route("admin.posts.store")}}" method="POST">
      
      @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="string" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo" value="{{old("title")}}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Testo</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci testo" required>{{old("content")}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select name="category_id" class="form-control">
            <option value="">-- seleziona categoria --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="{{$tag->slug}}">
                    <label class="form-check-label" for="{{$tag->slug}}">
                        {{$tag->name}}
                    </label>
                </div>
             @endforeach
        </div>
      
      
      <button type="submit" class="btn btn-warning my-3">Crea Post</button>
  </form>

  <a href="{{route('admin.posts.index')}}"><button type="button" class="btn btn-dark">Back</button></a> 
  

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>
@endsection

