<table class="table table-bordered ">
    <thead class=" table-dark">
        <tr>
            <th scope="col">Folio</th>
            <th scope="col">Producto</th>
            <th scope="col">Fecha de envío</th>
            {{-- <th scope="col">Hora de envío</th> --}}
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Acciones</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sends as $send)
        <tr>
            <th scope="row">{{ $send->folio }}</th>
            <td>{{$send->product }}</td>
            <td>{{ $send->date_send }}</td>
            {{-- <td>{{ $send->hour_send }}</td> --}}
            <td>{{ $send->departure_location }}</td>
            <td>{{ $send->arrival_location }}</td>
            <td>
                @auth
                    <a class="btn btn-sm btn-primary" href="{{ route('detail-send', encrypt($send->id)) }}">Detalle</a>
                @endauth


                <a class="btn btn-sm btn-success" href="{{ route('track',  encrypt($send->id)) }}">Seguir envío</a>
            </td>
            <td>
                @if ($send->completed )
                    <div class="alert alert-success p-0 text-center">
                       <small>Completado</small>
                    </div>
                @else
                    <div class="alert alert-danger p-0 text-center">
                        <small>En proceso</small>
                    </div>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
