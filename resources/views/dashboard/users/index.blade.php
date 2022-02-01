@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="card p-3">
            <div class="card-body ">
                <h3 class="pb-3">Users</h3>
                <div class="row pb-4">
                    <div class="col-md-4">
                        <form action="{{route('dashboard.users.search')}}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="query" class="form-control form-control-lg" placeholder="Search Users" value="{{isset($query) ? $query : ''}}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(auth()->user()->hasrole('Administrator') || auth()->user()->hasrole('Super_Admin'))
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-lg"><li class="fas fa-plus"></li> <a href="{{route('dashboard.users.create')}}" class="text-white text-decoration-none">Add User</a></button>
                        </div>
                    @endif
                </div>
                    <table class="table table-bordered table-responsive-sm">
                        <thead>
                        <tr>
                            <th class="text-center">Index</th>
                            <th class="text-center">FirstName</th>
                            <th class="text-center">LastName</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Image</th>
                            @if(auth()->user()->hasrole('Administrator') || auth()->user()->hasrole('Super_Admin'))
                                <th class="text-center">Actions</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index=>$user)
                                    <tr>
                                        <td class="text-center">{{$index +1}}</td>
                                        <td class="text-center">{{$user->first_name}}</td>
                                        <td class="text-center">{{$user->last_name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center"> <img width="70px" class="img-thumbnail" src="{{asset('uploads/user_images/'.$user->image_url)}}" class="img"></td>
                                        @if(auth()->user()->hasrole('Administrator') || auth()->user()->hasrole('Super_Admin'))
                                            <td class="text-center">
                                                @if(auth()->user()->hasrole('Administrator')||auth()->user()->hasrole('Super_Admin'))
                                                <button class="btn btn-primary mr-1"><i class="fas fa-pen"></i>
                                                    <a class="text-white text-decoration-none"
                                                       href="{{route('dashboard.users.edit',$user->id)}}">Update</a></button>
                                                @endif
                                                @if(auth()->user()->hasrole('Administrator'))
                                                    <button class="btn btn-danger mr-1"><i class="fas fa-trash"></i>
                                                        <a class="text-white text-decoration-none"
                                                           href="{{route('dashboard.users.destroy',$user->id)}}">Delete</a></button>
                                                @endif

                                            </td>
                                        @endif
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
