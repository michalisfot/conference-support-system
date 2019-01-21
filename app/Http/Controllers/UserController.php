<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\User2role;

class UserController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
        
        // Create a new User
        $user = new User();
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        // Save Message
        $user->save();
        
        // Create a nec User2role
        $u2r = new User2role();
        $u2r->userId = $user->id;
        $u2r->roleId = 1;
        // Save Message
        $u2r->save();
        
        // Redirect
        return redirect('/')->with('success', 'You have successfully registered');
    }
    
    public function login(Request $request){
        if(session()->get('id'))
            return redirect('/')->with('fail', 'You are already logged in');
        
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required'
        ]);
        
        $user = User::where('email', $request->input('email'))->get();
        
        if(count($user) > 0) {
            $pass = $user[0]->password;
            if($pass == $request->input('password')) {
                $user2role = User2role::where('userId', $user[0]->id)->get();
                $role = Role::where('id',$user2role[0]->roleId)->get();
                session()->put('id', $user[0]->id);
                session()->put('role', $role[0]->title);
                return redirect('/profile')->with('success', 'You have successfully logged in');
            } else {
                return redirect('/login')->with('fail', 'Wrong password');}
        } else {
            return redirect('/login')->with('fail', 'There is no such user');
        }
    }
    
    public function logout(){
        if(!session()->get('id'))
            return redirect('/')->with('fail', 'You are not logged in');
        
        session()->forget('id');
        session()->forget('role');
        return redirect('/')->with('success', 'You have successfully logged out');
    }
    
    public function getUsers(){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        $users = User::all();
        return view('users')->with('users', $users);
    }    
    
    public function delete(Request $request){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        $id = $request->input('id');
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'Deletion was successfull');
    }
}
