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

            <a href="#" class="btn btn-sm btn-danger"
              onclick="event.preventDefault(); document.querySelector('form.thread-rm').submit();">
              Excluir
            </a>
            <form action="{{ route('threads.destroy', $thread->slug) }}" class="thread-rm" 
              style="display: none;" method="post">
              @csrf
              @method('DELETE')
              
            </form>
            
        </div>
      </div>
    </div>
  </div>
    
@endsection