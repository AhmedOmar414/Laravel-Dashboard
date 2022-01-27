<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //Retrieve all users data from the database
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }//end of index

    //Show the form for creating user
    public function create()
    {
       return view('dashboard.users.create');
    }//end of create

    //Store the created user data to the database
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>['required','max:50'],
            'last_name'=>['required','max:50'],
            'email'=>['required','email','unique:users'],
            'password'=>'required|confirmed|min:8',
        ]);

        $data = $request->all();
        User::create([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        return redirect('dashboard/users/index')->with('status','User Created successfully');
    }//end of store


    public function show($id)
    {
    }

    //Show the edit users form
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view('dashboard.users.edit',compact('data'));
    }//end of edit


    //Update specific user data
    public function update(Request $request,$id)
    {
        $request->validate([
            'first_name'=>['required','max:50'],
            'last_name'=>['required','max:50'],
            'email'=>['required','email','unique:users'],
            'password'=>'required|confirmed|min:8',
        ]);

        $data = $request->all();
        User::where('id',$id)->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        return redirect('dashboard/users/index')->with('status','updated successfully');
    }//end of update


    //Remove specific user from the database
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('del','user deleted successfully');
    }//end of destroy

}
