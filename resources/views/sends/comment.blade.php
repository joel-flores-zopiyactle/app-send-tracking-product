@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <x-alert-message></x-alert-message>
    </div>

    <form action="{{route('comment-post')}}" method="post">
        @csrf
        <input type="hidden" name="send_id" value="{{$id}}">
        <div class="form-group">
            <label for="comment">Dejar comentario:</label>
            <textarea name="comment" id="" cols="1" rows="2" class="form-control" placeholder="Deja su comentario del servicio o producto..."></textarea>
        </div>

        <button class="btn btn-success rounded-pill">Comentar</button>
    </form>
</div>
@endsection
