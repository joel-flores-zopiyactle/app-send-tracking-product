@extends('layouts.app')
@section('title')
    No-hay-resultados
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height:400px;">
   <div>
       <div class="d-flex justify-content-center w-100">
           <figure>
               <img src="{{asset('img/icon-app.png')}}" class="w-25" alt="Logo 404">
           </figure>
       </div>
       <h1 class="text-danger">No hay resultados de su busqueda. Verifique su folio.</h1>
   </div>

</div>
@endsection
