@extends('layouts.app')

@section('title')
    Comentarios
@endsection

@section('content')
<div class="container">
    <h2>Comentarios del producto</h2>
    <hr>
    @if (count($comments) > 0)
        <ul class="list-group">
            @foreach ($comments as $comment)
                <li class="list-group-item">{{$comment->comment}}
                    <ul >
                        <li><small>publicado: {{$comment->created_at->diffForHumans()}}</small></li>
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning">
            No hay comentarios por mostrar.
        </div>
    @endif


</div>
@endsection

