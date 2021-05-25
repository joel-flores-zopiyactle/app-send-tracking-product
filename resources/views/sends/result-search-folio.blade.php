@extends('layouts.app')

@section('content')
<div class="container">

    {{--  search product Form --}}
    <x-form-search-folio></x-form-search-folio>
   {{-- end search product Form --}}

   @if (count($sends) > 0)
    <h3>Resultados de la busqueda</h3>
    <hr>

    <x-table-details-send :sends="$sends"></x-table-details-send>
    @else
        <h2>No hay resultados de la busqueda</h2>
    @endif

</div>
@endsection
