@extends('layouts.app')
@section('title')
    En proceso
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

            <div class="alert alert-info">
                Envíos en proceso
            </div>
            <hr>
            <x-table-details-send :sends="$sends"></x-table-details-send>
            <div class="my-1">
                <hr>
                {{ $sends->links() }}
            </div>
        </div>
        @else
            <div class="alert alert-info" role="alert">
                No hay envíos en proceso...
            </div>
        @endif

    </div>
   {{-- end list product --}}

</div
@endsection
