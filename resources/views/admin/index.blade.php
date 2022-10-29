@extends('layouts.admin',['title'=>'dashboard'])
@section('body')
    <diV class="row">
        <div class="col s12 m6 l3">
            <div class="card teal darken-1 white-text">
                <div class="card-content center">
                    <p class="card-title">
                        Categories
                    </p>
                    <b>10</b>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l3">
            <div class="card teal darken-1 white-text">
                <div class="card-content center">
                    <p class="card-title">
                        Books
                    </p>
                    <b>10</b>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l3">
            <div class="card teal darken-1 white-text">
                <div class="card-content center">
                    <p class="card-title">
                        Users
                    </p>
                    <b>10</b>
                </div>
            </div>
        </div>
    </diV>
@endsection
