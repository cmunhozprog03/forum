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

    <!-- Respostas -->
    <div class="col-8 mt-3">

      <h5>Respostas</h5>
      <hr>
      
      @foreach ($thread->replies as $reply)
        <div class="card">
          <div class="card-body">
            {{ $reply->reply}}
          </div>
          <div class="card-footer">
            <small>Respondido por {{$reply->user->name}} a {{ $replay->created_at->diffForHumans() }}</small>  
          </div>
        </div>
          
      @endforeach
    </div>
    <!--./respostas-->

    <!-- Responder -->
    <div class="col-8">
      
        <form action="{{ route('replies.store')}}" method="post">
          @csrf
          <div class="form-group">
            <input type="hidden" name="thread_id" value="{{ $thread->id }}">
            <label for="">Responder</label>
            <textarea name="reply" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Responder</button>
        </form>

    </div>
    <!-- ./Responder -->
  </div>
    
@endsection