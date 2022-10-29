
<link rel="stylesheet" href="{{asset('plugins/materialize/materialize.min.css')}}">
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/style.css')}}">

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
<div class="container">
<div class="col s12 m7">

    <h2 class="header">{{$books->title}}</h2>
    <div class="card horizontal">
        <div class="card-image">
            <img src="{{asset('storage/'.$book->photo)}}">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <p>{{$book->detail}}</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{asset('plugins/materialize/materialize.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
</script>
