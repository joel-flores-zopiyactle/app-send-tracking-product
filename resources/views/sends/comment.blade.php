@extends('layouts.app')

@section('title')
    Dejar comentario
@endsection

@section('content')
<div class="container">
    <div class="row">
        <form action="{{route('comment-post')}}" method="post" class="col-md-7 offset-md-2">
            <div>
                <x-alert-message></x-alert-message>
            </div>
            @csrf
            <input type="hidden" name="send_id" value="{{$id}}">
            <div class="form-group">
                <label for="comment">Dejar comentario:</label>
                <textarea name="comment" id="" cols="1" rows="2"
                class="form-control @error('comment') is-invalid @enderror"
                placeholder="Deja su comentario del servicio o producto..." required>{{old('comment')}}</textarea>
                <div>
                    <small>Mínimo 15 carácteres.</small>
                </div>
                @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success rounded-pill">Comentar</button>
        </form>
    </div>
</div>
@endsection
