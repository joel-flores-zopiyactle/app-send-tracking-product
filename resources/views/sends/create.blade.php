@extends('layouts.app')

@section('title')
    Nuevo envío
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Registrar nuevo envío</h4>
            <hr>
            {{-- Message of status send --}}
            <div>
                <x-alert-message></x-alert-message>
            </div>

            {{-- end status send --}}
            <form action="{{ route('save') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="folio">Folio:</label>
                    <input type="text" name="folio" id="folio" class="form-control @error('folio') is-invalid @enderror" value="{{ old('folio') }}" placeholder="Folio..." required >

                    @error('folio')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product">Producto:</label>
                    <input type="text" name="producto" id="product" class="form-control" value="{{ old('producto') }}" placeholder="Producto..." required>
                </div>

                <div class="form-group">
                    <label for="client">Cliente:</label>
                    <input type="text" name="cliente" id="client" class="form-control" value="{{ old('cliente') }}" placeholder="Nombre completo..." required>
                </div>

                <div class="form-group">
                    <label for="provider">Vendedor:</label>
                    <input type="text" name="vendedor" id="provider" class="form-control" value="{{ old('vendedor') }}"  placeholder="Nombre completo..." required>
                </div>

                {{-- Group input of type date --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="date_send">fecha de envío:</label>
                        <input type="date" name="fecha_envio" id="date_send" class="form-control" value="{{ old('fecha_envio') }}"  placeholder="Fecha de envío..." required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="hour-send">Hora de envío:</label>
                        <input type="time" name="hora_envio" id="hour_send" class="form-control" value="{{ old('hora_envio') }}" placeholder="Hora de envío..." required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="arrival_date">Fecha de llegada:</label>
                        <input type="date" name="fecha_llegada" id="arrival_date" class="form-control" value="{{ old('fecha_llegada') }}" placeholder="Fecha llegada..." required>
                    </div>
                </div>

                  {{-- Group input of type location --}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="product_output">Ubicación salida del producto:</label>
                        <input type="text" name="salida" id="product_output" class="form-control @error('salida') is-invalid @enderror" value="{{ old('salida') }}" placeholder="Ubicación..." required>

                        @error('product_output')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="arrival_product">Ubicación llegada del producto:</label>
                        <input type="text" name="llegada" id="arrival_product" class="form-control @error('llegada') is-invalid @enderror" value="{{ old('llegada') }}" placeholder="Ubicación llegada del producto..." required>

                        @error('arrival_product')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Costo de envío:</label>
                    <input type="text" pattern="[0-9.]+"  name="precio" id="price" class="form-control" value="{{ old('precio') }}" placeholder="Precio..." required>
                </div>

                <div class="form-group">
                    <hr>
                    <label for="comment">Seguimiento del envío:</label>
                    <textarea name="comentario" id="" cols="1" rows="2" class="form-control @error('comentario') is-invalid @enderror" value="{{ old('comentario') }}" placeholder="Ingrese el estado del envío"></textarea>
                    @error('comentario')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3 float-right">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary mr-2">Cancelar</a>
                    <button type="submit" class="btn btn-success ml-3">Envíar</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
