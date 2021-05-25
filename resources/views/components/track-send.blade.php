 {{--  track --}}
 <div class="row justify-content-center" id="tracking">
    <div class="col-md-11">
         <h4>Rastreo del producto: <strong>{{$product[0]->product}}</strong></h4>
         <p>
             <small>Origen: {{$product[0]->product_output}} - Destino: {{$product[0]->arrival_product}}</small>
         </p>
         <hr>

         <div>
            <ul class="list-group">
                @foreach ($trackingSend as $track)
                    <li class="mb-2">
                        {{$track->comment}}
                        <ul>
                            <li>Hora publicado: {{$track->created_at}}</li>
                        </ul>
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>
</div>
{{-- end track --}}
