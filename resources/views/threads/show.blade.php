@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">
    <div class="col-8">
      <h2>{{ $thread->title }}</h2>
    </div>

    <div class="col-8">
      <div class="card">

        <div class="card-header">
          <small>Criado por {{ $thread->user->name }} a {{ $thread->created_at->diffForHumans() }}</small> 
        </div>

        <div class="card-body">
          {{ $thread->body }}
        </div>

        <div class="card-footer">

            <a href="{{ route('threads.edit', $thread->slug) }}" class="btn btn-sm btn-primary">Editar</a>

            <form action="{{ route('threads.destroy', $thread->slug) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Excluir</button>
            </form>
            
        </div>
      </div>
    </div>
  </div>
    
@endsection