@extends('layouts.admin',['title'=>'User'])
@section('body')
    <div class="row">
        <div class="sol s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        List of Users
                    </h4>
                    @if($adminusers->count() < 1)

                        <p class="center my-4 red-text">No Record Found</p>
                    @else
                        <table id="page-length-option">
                            <thead>
                            <tr>
                                <th>NO#</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>profile</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($adminusers as $user)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <div style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden;">
                                        <img src="{{asset('storage/'.$user->profile)}}" width="100%" alt="">
                                    </div>
                                </td>
                                <td>
                                    <form action="{{route('adminuser.destroy',['adminuser'=>$user->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-floating btn-small waves-effect transparent">
                                            <i class="material-icons red-text">delete</i>
                                        </button>
                                        <a href="{{route('adminuser.edit',$user->id)}}" class="btn btn-small btn-small btn-floating transparent">
                                            <i class="material-icons yellow-text">edit</i>
                                        </a>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <br>
                    <a href="{{route('adminuser.create')}}" class="btn btn-floating transparent waves-effect">
                        <i class="material-icons black-text">add</i>
                    </a>
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
