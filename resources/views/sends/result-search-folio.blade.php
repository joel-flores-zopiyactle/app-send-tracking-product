@extends('layouts.app')

@section('title')
        Resultados
@endsection

@section('content')
<div class="container">

    {{--  search product Form --}}
    <div class="shadow-sm p-3 mb-1 bg-body rounded">
        <x-form-search-folio></x-form-search-folio>
    </div>
   {{-- end search product Form --}}

   @if (count($sends) > 0)

    <div class="shadow p-3 mb-2 bg-body rounded">
        <div class="alert alert-success">
            Resultados de la busqueda
        </div>

        <hr>
        <x-table-details-send :sends="$sends"></x-table-details-send>
    </div>
    @else
        <div class="alert alert-warning" role="alert">
            <h2>No hay resultados de la busqueda</h2>
        </div>

    @endif

</div>
@endsection
