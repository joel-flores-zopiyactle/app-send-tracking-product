<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>  {{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{asset('img/icon-app.png')}}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


        {{-- CDN Bootstrap --}}
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .bg-img {
                width:100%;
                height: 100vh;
                background-size: contain;
                background-repeat: no-repeat;
                background-image: url({{asset('img/bg-box.jpg')}});
                background-color: rgba(0, 0, 0, 0);
                /*filter: grayscale(0.5) blur(2px);*/

            }

            .bg-card-search {
                background-color: rgba(0, 0, 0, 0.3);
                filter: none;
                z-index: 100;
            }
        </style>
    </head>
    <body class="bg-img">

        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
            <a class="navbar-brand" href="#">  {{ config('app.name', 'Laravel') }}</a>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      @if (Route::has('login'))
                          <div class="navbar-nav">
                              @auth
                                  <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
                              @else
                                  <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                                  @if (Route::has('register'))
                                      <a class="nav-link" href="{{ route('register') }}">Registro</a>
                                  @endif
                              @endauth
                          </div>
                      @endif
                  </div>
            </div>
        </nav>
        <div class="d-flex justify-content-center align-items-center" style="height: 500px;">
            <div class="container">
                <div class="bg-card-search p-4 rounded">
                    <div class="d-flex justify-content-center md:h1 sm:h3 h3 mb-2">
                        <b class="text-white">{{'Rastrear el producto'}}</b>
                    </div>

                    <div class="">
                        {{-- track form of seach folio --}}
                        <x-form-search-folio></x-form-search-folio>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
