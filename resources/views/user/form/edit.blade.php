@extends('layouts.user',['title'=>'Add Books'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Edit Book</h4>
                    <form action="{{route('userbooks.update',$userbook->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="container">
                            @include('user.form.inputs')
                        </div>
                        <button class="btn waves-effect" type="submit">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
