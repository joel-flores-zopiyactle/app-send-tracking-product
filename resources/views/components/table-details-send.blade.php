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
                @auth
                    <a class="btn btn-sm btn-primary" href="{{ route('detail-send', $send->id) }}">Detalle</a>
                @endauth


                <a class="btn btn-sm btn-success" href="{{ route('track',  $send->id) }}">Seguir envío</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
