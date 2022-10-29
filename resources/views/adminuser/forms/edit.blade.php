@extends('layouts.admin',['title'=>'User'])
@section('body')
    <div class="row">
        <div class="sol s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Update user
                    </h4>
                    <form action="{{route('adminuser.update',$adminuser->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
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
