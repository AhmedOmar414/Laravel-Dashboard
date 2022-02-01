@extends('master')

@section('content')
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
                <form method="POST" action="{{route('dashboard.users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label id="first_name">First Name</label>
                        <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Last Name</label>
                        <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Email</label>
                        <input type="eamil" class="form-control" value="{{old('email')}}" name="email" aria-describedby="addon-wrapping" required/>
                    </div>
                    <label for="file" style="cursor: pointer;">Upload Image</label><br>
                    <input class="mb-2" class="thumbnail" type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"><br>
                    <img class="mb-2" id="output" width="200" />
                    <script>
                        var loadFile = function(event) {
                            var image = document.getElementById('output');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                    <div class="form-group mb-4">
                        <label id="first_name">Password</label>
                        <input type="password" class="form-control"  name="password" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label id="first_name">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" aria-describedby="addon-wrapping" required/>
                    </div>
                    <label for="select">User Role </label><br>
                    <select id="select" name="role">
                        <option value="Administrator">Administrator</option>
                        <option value="Super_Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                    </select>
                    <div class="form-group mb-4 mt-4">
                       <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
