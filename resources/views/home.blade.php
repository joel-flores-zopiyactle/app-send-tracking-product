@extends('layouts.app')
@section('title')
    Inicio
@endsection

@section('content')
<div class="container">
   {{--  search product Form --}}
   <div class="shadow-sm p-3 bg-body rounded">
    <x-form-search-folio></x-form-search-folio>
   </div>
   {{-- end search product Form --}}

   {{-- List products --}}
    <div class="mt-2">
        @if (count($sends) > 0)
        {{--  {{$sends}} --}}
        <div class="shadow p-3 mb-5 bg-body rounded">

            <x-filter></x-filter>

            <div class="alert alert-success">
                Envíos recientes de productos
            </div>
            <hr>
            <x-table-details-send :sends="$sends"></x-table-details-send>
        </div>
        @else
            <div class="alert alert-info" role="alert">
                Todabia no tiene productos enviados...
            </div>
        @endif

    </div>
   {{-- end list product --}}

</div
@endsection
