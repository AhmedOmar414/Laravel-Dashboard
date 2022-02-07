<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administrator'])->only('destroy');
        $this->middleware(['role:Administrator|Super_Admin'])->only('create','store','edit','update');
    }

    public function index()
    {
            $users = User::role(['Admin','Super_Admin'])->get();
            return view('dashboard.users.index',compact('users'));
    }


    public function search(Request $request){
        $query = $request->get('query');
        $users = Search::add(User::role(['Admin','Super_Admin']),['first_name','last_name'])->get($query);
        return view('dashboard.users.index',compact(['users','query']));
    }


    public function create()
    {
       return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>['required','max:50'],
            'last_name'=>['required','max:50'],
            'email'=>['required','email','unique:users'],
            'password'=>'required|confirmed|min:8',
            'role'=>['required'],
            'image'=>'mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->all();
        $user = new User;
        if ($request->file('image')){
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $image->move('uploads/user_images',$image_name);
            $user->image_url = $image_name;
        }

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        $user->assignRole($request->role);
        $user->save();

        return redirect('dashboard/users/index')->with('status','User Created successfully');
    }

    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view('dashboard.users.edit',compact('data'));
    }


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
        unlink("uploads/user_images/".$user->image_url);
        $user->delete();

        return redirect()->back()->with('del','user deleted successfully');
    }//end of destroy

}
