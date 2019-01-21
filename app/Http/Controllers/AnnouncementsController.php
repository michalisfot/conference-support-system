<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementsController extends Controller
{
    public function getAnnouncements(){
        $announcements = Announcement::all();
        
        return view('home')->with('announcements', $announcements);
    }

    public function postAnnouncement(Request $request){
        $userId = session()->get('id');
        
        if(!$userId && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        // Create a new User
        $announcement = new Announcement();
        $announcement->title = $request->input('title');
        $announcement->content = $request->input('content');
        $announcement->userId = $userId;

        // Save Message
        $announcement->save();
        
        // Redirect
        return redirect('/')->with('success', 'You have successfully posted an Announcement');
    }
}
