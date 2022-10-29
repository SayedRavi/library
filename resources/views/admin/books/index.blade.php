@extends('layouts.admin',['title'=>'books'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">List of Books</h4>
                                        <div id="books">
                        <div class="row">
                            <div class="col s12 m6">
                                <a href="{{route('books.create')}}" class="btn">
                                    Add
                                </a>
                            </div>

                        </div>
                    </div>
                    @if($books->count() < 1)
                        <p class="center red-text my-4">No record found</p>
                    @else

                            <table id="page-length-option">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1 @endphp
                                @foreach($books as $book)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td class="names">{{$book->title}}</td>
                                    <td>
                                        <div style="width: 50px; height: 50px;  overflow: hidden;" class="z-depth-1">
                                            <img src="{{asset('storage/'.$book->photo)}}" width="100%;" alt="">

                                        </div>
                                    </td>

                                    <td>{{$book->category}}</td>
                            <td>{{$book->user_name}}</td>
                                    <td>
                                        <form action="{{route('books.destroy',$book->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-small btn-floating transparent">
                                                <i class="material-icons red-text">delete</i>
                                            </button>
                                            <a href="{{route('books.edit',$book->id)}}" class="btn btn-small btn-small btn-floating transparent">
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
                    <br>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/datatable/datatable.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatable/select.datatable.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatable/datatable.css')}}">
@endpush
@push('js')
    <script src="{{asset('plugins/datatable/datatable.min.js')}}"></script>
    <script src="{{asset('plugins/datatable/select.datatable.min.js')}}"></script>
    <script src="{{asset('plugins/datatable/init.js')}}"></script>
    <Script>
        $(document).ready(function(){
            $('table').dataTable();
            $("select[name='page-length-option_length']").addClass('browser-default');

        });
    </Script>
@endpush
