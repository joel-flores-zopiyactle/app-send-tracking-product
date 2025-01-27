@extends('layouts.app')

@section('title')
    Llevar-seguimiento
@endsection

@section('content')
<div class="container">
   {{--  search product Form --}}
   <h3>Comentar el estado del seguímiento del envio</h3>
   <hr>

    {{-- Message of status send --}}
    <div>
        <x-alert-message></x-alert-message>
    </div>

   <div class="row justify-content-center" id="search-form">
        {{-- List status of send --}}
        <div class="col-md-5">
            <x-track-send :trackingSend="$tracking" :product="$product"></x-track-send>
        </div>

        {{-- end status send--}}

        {{-- Form of status send product --}}
        <form class="col-md-7" action="{{ route('post-tracking') }}" method="post">
            @csrf

           <input type="hidden" name="send_id" value="{{$id}}">
           <div class="form-group">
               <label for="status">Estado del envío</label>

               <textarea name="description" id="description" cols="2" rows="2"
               class="form-control @error('folio') is-invalid @enderror"
               placeholder="Describe el estado o la ubicaccíon del envio..."></textarea>

               @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
           </div>

           <div class="form-group mt-2">
               <button type="submit" class="btn btn-primary">Publicar</button>
           </div>
        </form>
   </div>
   {{-- end search product Form --}}
</div>
@endsection
