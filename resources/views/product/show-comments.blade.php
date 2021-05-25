@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Comentarios del producto</h2>
    <hr>
    <ul class="list-group">
        @foreach ($comments as $comment)
            <li class="list-group-item">{{$comment->comment}}
                <ul >
                    <li><small>publicado: {{$comment->created_at->diffForHumans()}}</small></li>
                </ul>
            </li>
        @endforeach

    </ul>

</div>
@endsection

