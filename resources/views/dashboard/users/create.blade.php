@extends('master')

@section('create')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body ml-2 mr-2">
                <h3 class="mb-5">Add New User</h3>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <form method="POST" action="{{route('dashboard.users.store')}}">
                    @csrf
                    <div class="form-group mb-4">
                        <label id="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Email</label>
                        <input type="eamil" class="form-control" name="email" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Password</label>
                        <input type="password" class="form-control" name="password" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                       <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
