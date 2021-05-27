@extends('layouts.app')

@section('title')
    Seguímiento
@endsection

@section('content')
<div class="container">
   {{--  track --}}
   <div class="w-75 mx-auto" id="search-form">
    <x-track-send :trackingSend="$tracking" :product="$product"></x-track-send>
   </div>

   <div class="text-center mt-3">
       <a href="{{ route('show-form-commnet',$id) }}" class="btn btn-success rounded-pill">Comentar del servicio o producto</a>
   </div>
   {{-- end track --}}



</div>
@endsection
