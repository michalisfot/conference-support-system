<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Department2university;
use App\University;
use App\Social;

class ProfileController extends Controller
{
    public function getProfile(){
        if(!session()->get('id'))
            return redirect('/')->with('fail', 'You are not logged in');
        
        $userId = session()->get('id');
        
        $user = User::find($userId);
        
        $social = Social::where('userID', $userId);
                
        $university = University::orderBy('id')->pluck('name');
                
        return view('profile', compact('user', 'social', 'university'));
    }   
    
    public function updateProfile(Request $request){
        if(!session()->get('id'))
            return redirect('/')->with('fail', 'You are not logged in');
        
        $userId = $request->input('id');
        
        $user = User::find($userId);
        
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        
        if($request->input('password'))
            $user->password = $request->input('password');
        
        if($request->input('picture'))
            $user->picture = $request->input('picture');
        
        if($request->input('university')){
            $university = University::orderBy('id')->get()[$request->input('university')];

            if($request->input('department')){
                $department = Department::where('name', $request->input('department'))->get();
                if($department->isNotEmpty()){
                    $departmentId = $department[0]->id;
                    $d2u = Department2university::where('universityId', $university->id)->where('departmentId', $departmentId)->get();
                    $user->departmentId = $d2u->id;
                } else {
                    // Create a new Department
                    $department = new Department();
                    $department->name = $request->input('department');
                    $department->save();
                    $departmentId = $department->id;
                    
                    // Create a new Department2university
                    $d2u = new Department2university();
                    $d2u->departmentId = $departmentId;
                    $d2u->universityId = $university->id;
                    $d2u->city = '-';
                    $d2u->save();
                    $user->departmentId = $d2u->id;
                }
            }
        }
        
        $user->save();
        
        if($request->input('social') && $request->input('socialType')){
            $social = Social::where('userID', $userId)->where('type', $request->input('socialType'))->get();
            if($social->isEmpty()){
                // Create a new Social
                $social = new Social();
                $social->userId = $userId;
                $social->type = $request->input('socialType');
                $social->link = $request->input('social');
                $social->save();
            }
        }
        
        return redirect('profile')->with('success', 'You have successfully updated your profile');
    }   
}
