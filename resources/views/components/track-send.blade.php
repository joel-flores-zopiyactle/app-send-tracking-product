 {{--  track --}}
 <div class="row justify-content-center" id="tracking">
    <div class="col-md-11">
         <h5>Rastreo del Producto: <strong>{{$product[0]->product}}</strong></h5>
         <p>
             <small>Origen: {{$product[0]->product_output}} - Destino: {{$product[0]->arrival_product}}</small>
         </p>
         <hr>

         <div>
            <ul class="list-group list-group-flush">
                @foreach ($trackingSend as $track)
                    <li class="mb-2 border-track-left list-group-item">
                        {{$track->comment}}
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
    </div>
</div>
{{-- end track --}}
