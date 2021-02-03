@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">

    <div class="col-8">
      <h2>Criar Tópico</h2>
      <hr>
    </div>

    <div class="col-8">
      <form action="{{ route('threads.store')}}" method="post">
        @csrf
        

        <div class="form-group">
          <label>Título Tópico</label>
          <input type="text" name="title" class="form-control" />
        </div>

        <div class="form-group">
          <label>Conteúdo Tópico</label>
          <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success btn-lg">Criar Tópico</button>

      </form>
    </div>

  </div>
    
@endsection