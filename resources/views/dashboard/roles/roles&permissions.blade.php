@extends('master')

@section('content')
    <div class="content-wrapper">
       <div class="row pt-4">
           <div class="col-md-4">
               <div class="container mt-6">
                   <div class="card">
                       <div class="card-body">
                           <h3>Roles</h3>

                               <ul class="list-group">
                                   @foreach($roles as $role)
                                       <li class="list-group-item" style="font-size:20px">
                                           <h5 class="text-gray">
                                               {{$role->name}}
                                           </h5>
                                       </li>
                                   @endforeach
                                   <button class="text-decoration-none btn btn-primary mt-3 btn-lg" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                       Add New Role
                                   </button>
                                   <div class="collapse" id="collapse4">
                                       <form class="mt-4" method="POST" action="{{route('dashboard.roles.role_create')}}">
                                           @csrf
                                           <div class="form-group mb-3">
                                               <label for="role">Role Name</label>
                                               <input type="text" class="form-control" id="role" name="role" aria-describedby="addon-wrapping" required/>
                                           </div>
                                           <label> Role Permissions</label>
                                           <div class="tab-content">
                                               <input  type="checkbox" name="permissions[]" value="create_user" id="create_user">
                                               <label class="text-gray"  for="create_user">
                                                   Create Users
                                               </label>
                                               <input type="checkbox" name="permissions[]" value="delete_user" id="update_user">
                                               <label class="text-gray" for="update_user">
                                                   Update User
                                               </label>
                                               <input  type="checkbox" name="permissions[]" value="edit_user" id="delete_user">
                                               <label class="text-gray" for="delete_user">
                                                   Delete User
                                               </label>
                                               <input  type="checkbox" name="permissions[]" value="read_users" id="read_user">
                                               <label class="text-gray" for="read_user">
                                                   Read User
                                               </label>
                                           </div>
                                           <div class="form-group mb-3 mt-3" style="display:flex;align-items: center;justify-content: center">
                                               <button type="submit" class="btn btn-primary"> Add </button>
                                           </div>
                                       </form>
                                   </div>
                               </ul>

                       </div>
                   </div>
               </div>
           </div>
           <div class="col-md-4">
               <div class="container mt-6">
                   <div class="card">
                       <div class="card-body">
                           <h3>Permissions</h3>
                               <ul class="list-group">
                                   @foreach($permissions as $permission)
                                   <li class="list-group-item" style="font-size:20px">
                                       <h5 class="text-gray">
                                           {{$permission->name}}
                                       </h5>
                                   </li>
                                   @endforeach
                                   <button class="text-decoration-none btn btn-primary mt-3 btn-lg" data-toggle="collapse" href="#collapse5" role="button" aria-expanded="false" aria-controls="collapseExample">
                                       Add New Permission
                                   </button>
                                   <div class="collapse" id="collapse5">
                                       <form class="mt-4" method="post" action="{{route('dashboard.roles.permission_create')}}">
                                           @csrf
                                           <div class="form-group mb-3">
                                               <label id="permission">Permission Name</label>
                                               <input type="text" class="form-control" name="permission" aria-describedby="addon-wrapping" required/>
                                           </div>
                                           <div class="form-group mb-3" style="display:flex;align-items: center;justify-content: center">
                                               <button type="submit" class="btn btn-primary"> Add </button>
                                           </div>
                                       </form>
                                   </div>
                               </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection
