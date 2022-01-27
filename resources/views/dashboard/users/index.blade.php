@extends('master')

@section('users')
    <div class="content-wrapper">
        <div class="card p-3">
            <div class="card-body ">
                <h3 class="pb-3">Users</h3>
                <div class="row pb-4">
                    <div class="col-md-4">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control" placeholder="Search Users" aria-label="Search" />
                        </div>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary mr-1"><li class="fas fa-search"></li> Search</button>
                      <button class="btn btn-primary"><li class="fas fa-plus"></li> <a href="{{route('dashboard.users.create')}}" class="text-white">Add User</a></button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Index</th>
                        <th class="text-center">FirstName</th>
                        <th class="text-center">LastName</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($users)
                        @foreach($users as $index=>$user)
                            @if(auth()->user()->email == $user->email)
                                <tr>
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center">{{$user->first_name}}</td>
                                    <td class="text-center">{{$user->last_name}}</td>
                                    <td class="text-center">{{$user->email}} <span class="text-end text-bold text-danger">@yours</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary mr-1"><i class="fas fa-pen"></i>
                                            <a class="text-white"
                                               href="{{route('dashboard.users.edit',$user->id)}}">Update</a></button>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center">{{$user->first_name}}</td>
                                    <td class="text-center">{{$user->last_name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary mr-1"><i class="fas fa-pen"></i><a class="text-white" href="{{route('dashboard.users.edit',$user->id)}}">Update</a></button>

                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i><a href="{{route('dashboard.users.destroy',$user->id)}}" class="text-white">Delete</a></button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <h3>No Users Found</h3>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
