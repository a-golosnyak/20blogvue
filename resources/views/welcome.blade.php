<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>VueBlog</title>

        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">

    </head>
    <body>
        <div class=" position-ref full-height">
            <div class="content mt-5">
                <div class="title m-t-mb ">
                    Laravel_
                </div>
                <div id='app'>
                    
                    <image-carousel></image-carousel>
                    <example-component></example-component>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
    </body>
</html>





{{--
    
                @if (Route::has('login'))
                <div class="top-right links" class="">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
--}}