@extends('layouts.app')

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
                    <input type="text" name="product" id="product" class="form-control" value="{{ old('product') }}" placeholder="Producto..." required>
                </div>

                <div class="form-group">
                    <label for="client">Cliente:</label>
                    <input type="text" name="client" id="client" class="form-control" value="{{ old('client') }}" placeholder="Cliente..." required>
                </div>

                <div class="form-group">
                    <label for="provider">Vendedor:</label>
                    <input type="text" name="provider" id="provider" class="form-control" value="{{ old('provider') }}"  placeholder="Vendedor..." required>
                </div>

                {{-- Group input of type date --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="date_send">fecha de envío:</label>
                        <input type="date" name="date_send" id="date_send" class="form-control" value="{{ old('date_send') }}"  placeholder="Fecha de envío..." required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="hour-send">Hora de envío:</label>
                        <input type="time" name="hour_send" id="hour_send" class="form-control" value="{{ old('hour_send') }}" placeholder="Hora de envío..." required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="arrival_date">Fecha de llegada:</label>
                        <input type="date" name="date_arrival" id="arrival_date" class="form-control" value="{{ old('date_arrival') }}" placeholder="Fecha llegada..." required>
                    </div>
                </div>

                  {{-- Group input of type location --}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="product_output">Ubicación salida del producto:</label>
                        <input type="text" name="product_output" id="product_output" class="form-control @error('product_output') is-invalid @enderror" value="{{ old('product_output') }}" placeholder="Ubicación..." required>

                        @error('product_output')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="arrival_product">Ubicación llegada del producto:</label>
                        <input type="text" name="arrival_product" id="arrival_product" class="form-control @error('arrival_product') is-invalid @enderror" value="{{ old('arrival_product') }}" placeholder="Ubicación llegada del producto..." required>

                        @error('arrival_product')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Costo de envío:</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" placeholder="Precio..." required>
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
