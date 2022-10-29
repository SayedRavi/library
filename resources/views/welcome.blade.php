<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset('plugins/materialize/materialize.min.css')}}">
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }

        </style>

    </head>
    <body>


    <nav>
        <div class="nav-wrapper grey lighten-4">
            <div class="brand-logo hide-on-small-only"><div style="width: 40%; overflow: hidden; margin: 0 auto; margin-top: 9px; margin-left: 0;">
                    <img src="{{asset('img/logo2-removebg-preview.png')}}" width="100%" alt="">
                                   </div></div>
                                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>


                                <ul class="right hide-on-med-and-down">
                                    <li><a href="{{ route('login') }}" class="transparent waves-green grey-text "><i class="material-icons right">person</i> Login</a></li>
                                </ul>
                            </div>
                        </nav>

                        <ul class="sidenav" id="mobile-demo">
                           <li>
                               <div class="brand-logo">
                                   <div style="width: 50%; margin: 0 auto; margin-top: 2px; margin-left: 70px;">
                                       <img src="{{asset('img/logo2-removebg-preview.png')}}" width="100%" alt="">
                                   </div>
                               </div>
                           </li>
                            <li><a href="{{ route('login') }}" class="">Login</a></li>
                        </ul>


    <div class="parallax-container">
        <div class="parallax"><img src="{{asset('img/paral.jpg')}}"></div>
    </div>
    <section class="section section-search grey lighten-5 black-text center scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Search Book</h3>
                    <div class="invalid">
                        <form action="search" method="get">
                            <input type="search" name="search" class="white grey-text autocomplete" placeholder="Book Name...">
                            <button type="submit" class="btn">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section white">
        <div class="row container">
            <div class="row">
                @foreach($books as $book)

                <div class="col s12 m3">
                    <div class="card small">
                        <div class="card-image">
                            <img src="{{asset('storage/'.$book->photo)}}">
                        </div>
                        <div class="card-content">
{{--                            {{route('detail',['id'=>$book->id])}}--}}
                                <a href="" class="black-text">{{$book->title}}</a>
                                <br>
                                <a href="" class="black-text">{{$book->category}}</a>
                            <br>
                            <a href="{{asset('storage/'.$book->file)}}">
                                <button class="btn waves-effect">
                                    Download
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
    </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="{{asset('img/pexels-pixabay-159711.jpg')}}"></div>
    </div>

    {{--    <section>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col s12 m4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-image">--}}
{{--                            <img src="{{asset('img/SR.PNG')}}" alt="">--}}
{{--                            <h6 href="#"><span class="card-title">Book Name</span></h6>--}}
{{--                        </div>--}}
{{--                        <div class="card-content">--}}
{{--                                Author--}}
{{--                            </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}


                    {{--        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>--}}
{{--                    @else--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}


        </div>

    <footer class="page-footer grey darken-4">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Ebook library</h5>
                    <p class="grey-text text-lighten-4">You can use download your soft book(PDF's) from here.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2041 Copyright By HRA
            </div>
        </div>
    </footer>
    <script src="{{asset('plugins/materialize/materialize.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.parallax').parallax();
    });
</script>
    </body>
</html>
