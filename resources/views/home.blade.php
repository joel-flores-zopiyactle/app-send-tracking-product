@extends('layouts.app')

@section('content')
<div class="container">
   {{--  search product Form --}}
   <div class="row justify-content-center" id="search-form">
        <form class="col-md-6" action="{{ route('search_folio') }}" method="get">
            @csrf
            <div class="d-flex">
                <input type="search" name="folio" placeholder="Search"class="form-control" placeholder="Buscar producto por folio ..." required>
                <button class="btn btn-primary">Buscar</button>
            </div>
        </form>
   </div>
   {{-- end search product Form --}}

   {{-- List products --}}
    <div class="mt-5">
        <h3>Envíos recientes de productos</h3>
        <hr>
       {{--  {{$sends}} --}}
        <table class="table table-striped table-hover">
            <thead class=" table-dark">
                <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Fecha de envío</th>
                    <th scope="col">Hora de envío</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sends as $send)
                <tr>
                    <th scope="row">{{ $send->folio }}</th>
                    <td>{{$send->product }}</td>
                    <td>{{ $send->date_send }}</td>
                    <td>{{ $send->hour_send }}</td>
                    <td>{{ $send->product_output }}</td>
                    <td>{{ $send->arrival_product }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('detail-send', $send->id) }}">Detalle</a>

                        <a class="btn btn-sm btn-success" href="{{ route('track') }}">Seguir envío</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   {{-- end list product --}}

</div>
@endsection
