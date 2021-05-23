@extends('layouts.app')

@section('content')
<div class="container">
   {{--  search product Form --}}
   <h3>Comentar el estado del seguímiento del envio</h3>
   <hr>

    {{-- Message of status send --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif

   @if (session('error'))
       <div class="alert alert-danger">
           {{ session('error') }}
       </div>
   @endif

   <div class="row justify-content-center" id="search-form">
        {{-- List status of send --}}
        <div class="col-md-5">
            <div>
                <ul class="list-group">
                    @foreach ($tracking as $track)
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

        {{-- end status send--}}

        {{-- Form of status send product --}}
        <form class="col-md-7" action="{{ route('post-tracking') }}" method="post">
            @csrf

           <input type="hidden" name="send_id" value="{{$id}}">
           <div class="form-group">
               <label for="status">Estado del envío</label>

               <textarea name="description" id="description" cols="2" rows="2"
               class="form-control @error('folio') is-invalid @enderror"
               placeholder="Describe el estado o la ubicaccíon del envio..."></textarea>

               @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
           </div>

           <div class="form-group mt-2">
               <button type="submit" class="btn btn-primary">Publicar</button>
           </div>
        </form>
   </div>
   {{-- end search product Form --}}
</div>
@endsection
