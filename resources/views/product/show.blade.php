@extends('layouts.app')

@section('content')
<div class="container">
     {{-- deatil send --}}
    <div class="">
        <div class="d-flex justify-content-between">
            <div>
                <h4>Detalles del envío</h4>
            </div>
            {{-- Options --}}
            <div class="mt-2 d-flex">
                <a href="{{ route('edit-send', $detailSend->id) }}" class="btn btn-sm btn-light mr-2" title="Editar envío">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>

                <a href="{{ route('pust-status-send', $detailSend->id) }}" class="btn btn-sm btn-light mr-2" title="Nuevo informe de seguimiento">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                </a>

                <form action="{{ route('destroy', $detailSend->id) }}" method="post">
                   @csrf
                   @method('DELETE')
                   <input type="hidden" name="send_id" value="{{ $detailSend->id }}">
                    <button type="submit" class="btn btn-sm btn-light ml-2" onclick="return confirm('¿Estas seguro de elimar el envío?')" title="Eliminar envío">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
               </form>

                <a href="{{ route('show-comments-post', $detailSend->id) }}" class="btn btn-sm btn-light  ml-2 mr-2" title="Ver comentarios del envío">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </a>


            </div>
        </div>

        <hr>

        <div>
            <x-alert-message></x-alert-message>
        </div>

        <table class="table table-striped">
            <thead class="table-primary">
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

        <table class="table table-striped">
            <thead class=" table-primary">
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

        <table class="table table-striped">
            <thead class="table-primary">
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

</div>
@endsection
