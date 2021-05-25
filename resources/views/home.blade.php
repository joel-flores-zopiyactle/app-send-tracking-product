@extends('layouts.app')

@section('content')
<div class="container">
   {{--  search product Form --}}
   <x-form-search-folio></x-form-search-folio>
   {{-- end search product Form --}}

   {{-- List products --}}
    <div class="mt-5">
        @if (count($sends) > 0)
        <h3>Envíos recientes de productos</h3>
        <hr>
       {{--  {{$sends}} --}}
       <x-table-details-send :sends="$sends"></x-table-details-send>
        @else
            <div class="alert alert-info" role="alert">
                Todabia no tiene productos enviados...
            </div>
        @endif

    </div>
   {{-- end list product --}}

</div>
@endsection
