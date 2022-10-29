@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 offset-l2 l8 mt-5">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title my-4">Login</h4>
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col s12 input-field">
                        <i class="material-icons prefix">person_outline</i>
                        <input type="email" name="email" id="email" value="{{old('email')}}" class="@error('email') invalid @enderror">
                        <label for="username">User Name</label
                        >@error('email')
                        <blockquote>{{$message}}</blockquote>
                        @enderror
                            </div>
                            <div class="col s12 input-field">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="password" id="password" value="{{old('password')}}" class="@error('password') invalid @enderror">
                        <label for="password">Password</label>
                        @error('password')
                        <blockquote>{{$message}}</blockquote>
                        @enderror
                        </div>
                        <div class="col s12">
                            <button class="btn ml-5" type="submit">
                                login
                            </button>
                            <a href="" style="float: right">foget password</a>
                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
