@extends('layouts.app')

@section('title')
    Detalles-del-envío
@endsection

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
                <a href="{{ route('edit-send', encrypt($detailSend->id)) }}" class="btn btn-sm btn-light mr-2" title="Editar envío">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>

                <a href="{{ route('pust-status-send', encrypt($detailSend->id)) }}" class="btn btn-sm btn-light mr-2" title="Nuevo informe de seguimiento">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                </a>

                <form action="{{ route('destroy', encrypt($detailSend->id)) }}" method="post">
                   @csrf
                   @method('DELETE')
                   <input type="hidden" name="send_id" value="{{ encrypt($detailSend->id) }}">
                    <button type="submit" class="btn btn-sm btn-light ml-2" onclick="return confirm('¿Estas seguro de elimar el envío?')" title="Eliminar envío">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
               </form>

                <a href="{{ route('show-comments-post', encrypt($detailSend->id)) }}" class="btn btn-sm btn-light  ml-2 mr-2" title="Ver comentarios del envío">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </a>

                @if (!$detailSend->completed)
                    <form action="{{ route('completed-send', encrypt($detailSend->id)) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="send_id" value="{{ encrypt($detailSend->id) }}">
                        <button type="submit" class="btn btn-sm btn-success ml-2" onclick="return confirm('¿Estas seguro de finalizar el envío?')" title="Eliminar envío">
                            Completar envío
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                            </svg>

                        </button>
                    </form>
                @endif


            </div>
            {{-- end options --}}
        </div>

        <hr>
        {{-- Alert message --}}
        <div>
            <x-alert-message></x-alert-message>
        </div>
        {{-- end alert message --}}

        <div class="shadow p-3 mb-5 bg-body rounded">
            <table class="table table-striped">
                <thead class="table-success">
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
                <thead class=" table-success">
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
                <thead class="table-success">
                    <tr>
                        <th scope="col">Origen</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{$detailSend->departure_location}}</td>
                        <td>{{$detailSend->arrival_location}}</td>
                        <td>
                            $ {{number_format($detailSend->price, 2, '.', ',')}}
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   {{-- end detaild send --}}

</div>
@endsection
