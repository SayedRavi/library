@extends('layouts.admin',['title'=>'Categories'])
@section('body')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                @if($categories->count() < 1)
                    <p class="center red-text my-4">No Category found</p>
                @else
                <table>

                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NameTitle</th>
                        <th>Books</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @php $i = 1 @endphp
                    @foreach($categories as $category)
                        <td>{{$i++}}</td>
                        <td>{{$category->title}}</td>
                        <td>0</td>
                        <td>
                            <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button CLASS="btn btn-small btn-floating waves-effect transparent">
                                    <i class="material-icons red-text">delete</i>
                                </button>
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-floating btn-small transparent">
                                    <i class="material-icons yellow-text">edit</i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
                @endif
                    <br>
                    <a href="{{route('categories.create')}}" class="btn btn-floating btn-small transparent">
                        <i class="material-icons black-text">add</i>
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
