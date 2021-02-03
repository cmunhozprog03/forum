@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">

    <div class="col-8">
      <h2>Editar Tópico</h2>
      <hr>
    </div>

    <div class="col-8">
      <form action="{{ route('threads.update', $thread->slug)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Título Tópico</label>
          <input type="text" name="title" class="form-control" value="{{ $thread->title }}"/>
        </div>

        <div class="form-group">
          <label>Conteúdo Tópico</label>
          <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $thread->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-success btn-lg">Atualizar</button>

      </form>
    </div>

  </div>
    
@endsection