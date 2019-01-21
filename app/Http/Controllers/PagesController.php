<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }    
    
    public function getAbout(){
        return view('about');
    }    
    
    public function getContact(){
        return view('contact');
    }    
    
    public function getRegister(){
        return view('register');
    }       
    
    public function getLogin(){
        return view('login');
    }      
    
    public function getAnnouncements(){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        return view('announcements');
    }    
    
}
