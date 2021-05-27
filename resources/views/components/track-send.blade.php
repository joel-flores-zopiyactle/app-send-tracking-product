 {{--  track --}}
 <div class="row justify-content-center" id="tracking">
    <div class="col-md-11">

        <div class="shadow-sm p-2 mb-1 bg-body rounded">
            <h5>Rastreo del Producto: <strong>{{$product[0]->product}}</strong></h5>
            <hr>
            <p>
                <small>Origen: {{$product[0]->departure_location}} - Destino: {{$product[0]->arrival_location}}</small>
            </p>
        </div>
        @if (count($trackingSend) > 0)
        <div class="shadow p-3 mb-1 bg-body rounded">
            <ul class="list-group list-group-flush">
                @foreach ($trackingSend as $track)
                    <li class="mb-2 border-track-left list-group-item">
                        {{$track->body}}
                        <ul>
                            <li>
                                <small>
                                    Publicado: <span class="badge bg-primary text-white p-2">{{$track->created_at}}</span>
                                </small>
                            </li>
                        </ul>
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
        @else
        <div class="alert alert-warning">
            No hay información de seguímiento por mostrar.
        </div>
        @endif
    </div>
</div>
{{-- end track --}}
