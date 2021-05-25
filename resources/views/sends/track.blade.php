@extends('layouts.app')

@section('content')
<div class="container">
   {{--  track --}}
   <div class="row justify-content-center" id="search-form">
    <x-track-send :trackingSend="$tracking" :product="$product"></x-track-send>
   </div>

   <div class="text-center">
       <a href="{{ route('show-form-commnet',$id) }}" class="btn btn-success rounded-pill">Comentar del servicio</a>
   </div>
   {{-- end track --}}



</div>
@endsection
