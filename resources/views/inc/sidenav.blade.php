<ul class="sidenav sidenav-fixed" id="sidenav">
    <li><div style="width: 50%; margin: 0 auto; margin-top: 20px;">
            <img src="{{asset('img/SR.PNG')}}" width="100%" alt="">
        </div>
    </li>
    <li class="{{$active=='dashboard'?'active':''}}">
        <a href="{{route('admin.index')}}">Dashboard
            <i class="material-icons prefix">dashboard</i>
        </a>
    </li>

    <li class="{{$active=='users'?'active':''}}">
        <a href="{{route('adminuser.index')}}">User
            <i class="material-icons prefix">people</i>
        </a>
    </li>
    <li class="{{$active=='books'?'active':''}}">
        <a href="{{route('books.index')}}">Books
            <i class="material-icons prefix">book</i>
        </a>
    </li>
    <li class="{{$active=='categories'?'active':''}}">
        <a href="{{route('categories.index')}}">Categories
            <i class="material-icons prefix">list</i>
        </a>
    </li>

    <li class="waves-block waves-effect hide-on-large-only">
        <a href="#">Profile
            <i class="material-icons prefix">person</i>
        </a>
    </li>
    <li>
        <a href="javascript:viod(0);" onclick="$('#logout').submit()" class="waves-effect waves-block hide-on-large-only">
            Logout
            <i class="material-icons left">exit_to_app</i>
        </a>
    </li>

</ul>
