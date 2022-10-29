@extends('layouts.admin',['title'=>'Categories'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Categories</h4>

                    <div class="container">
                        <form action="{{route('categories.store')}}" method="post">
                            @csrf
                            <div class="col s12 input-field ">
                                <input type="text" name="title" id="title" value="{{old('title')}}" class=" @error('title') invalid @enderror">
                                <label for="title">Title</label>
                                @error('title')
                                <blockquote>{{$message}}</blockquote>
                                @enderror
                            </div>
                            <button class="btn waves-effect" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
