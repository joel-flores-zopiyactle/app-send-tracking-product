@extends('layouts.app')

@section('content')
<div class="container">
     {{-- deatil send --}}
    <div class="">
        <h4>Detalles del envío</h4>
        <hr>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class=" table-dark">
                <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Vendedor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$detailSend->folio}}</th>
                    <td>{{$detailSend->product}}</td>
                    <td>{{$detailSend->client}}</td>
                    <td>{{$detailSend->provider}}</td>

                </tr>
            </tbody>
        </table>

        <table class="table table-striped table-hover">
            <thead class=" table-dark">
                <tr>
                    <th scope="col">Fecha de envío</th>
                    <th scope="col">Hora de envío</th>
                    <th scope="col">Fecha llegada</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$detailSend->date_send}}</td>
                    <td>{{$detailSend->hour_send}}</td>
                    <td>{{$detailSend->date_arrival}}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-striped table-hover">
            <thead class=" table-dark">
                <tr>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Costo</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>{{$detailSend->product_output}}</td>
                    <td>{{$detailSend->arrival_product}}</td>
                    <td>
                        $ {{$detailSend->price}}
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
   {{-- end detaild send --}}


   <div class="mt-2 d-flex">
       <a href="{{ route('edit-send', $detailSend->id) }}" class="btn btn-sm btn-success mr-2">Editar</a>
       <a href="{{ route('pust-status-send', $detailSend->id) }}" class="btn btn-sm btn-primary mr-2">Seguímineto del envío</a>
       <form action="{{ route('destroy', $detailSend->id) }}" method="post">
           @csrf
           @method('DELETE')
           <input type="hidden" name="send_id" value="{{ $detailSend->id }}">
           <button type="submit" class="btn btn-sm btn-danger ml-2" onclick="return confirm('¿Estas seguro de elimar el envío?')">Eliminar</button>
       </form>
   </div>

</div>
@endsection
