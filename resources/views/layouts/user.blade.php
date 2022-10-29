@extends('layouts.app')
@section('title','admin | '.$title)
@section('content')

    <div>
        <nav>
            <div class="nav-wrapper teal darken-4">
                <a href="#!" class="brand-logo ml-lg-4" id="logo">Welcome</a>
                <a href="#" data-target="sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <a class="dropdown-trigger waves-effect mr-lg-5" href="" data-target="dropdown1">
                        <i class="material-icons left">person_outline</i>
                        {{auth()->user()->name}}
                        <i class="material-icons right">keyboard_arrow_down</i>
                    </a>
                    <ul id="dropdown1" class="dropdown-content">
                        <li>
                            <a href="">Profile
                                <i class="material-icons left">person</i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:viod(0);" onclick="$('#logout').submit()">Logout
                                <i class="material-icons left">exit_to_app</i>
                            </a>
                        </li>

                    </ul>
                </ul>
            </div>
            <form action="{{route('logout')}}" id="logout" method="post">
                @csrf
            </form>
        </nav>
        @yield('body')
    </div>



@endsection
