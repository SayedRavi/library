@extends('layouts.admin',['title'=>'User'])
@section('body')
    <div class="row">
        <div class="sol s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Create new user
                    </h4>
                    <form action="{{route('adminuser.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('adminuser.forms.inputs')
                        <button class="btn waves-effect" type="submit">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
