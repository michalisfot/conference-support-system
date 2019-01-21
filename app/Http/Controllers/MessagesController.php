<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\User2discussion;
use App\User;

class MessagesController extends Controller
{
    public function sendMessage(Request $request){
        $this->validate($request, [
            'subject' => 'required',
            'email' => 'required',      
            'message' => 'required'
        ]);
        
        $user = User::where('email', $request->input('email'))->get();
        
        if(count($user) > 0) {
            $id = $user[0]->id;
            
            // Create a new Discussion
            $discussion = new Discussion;
            $discussion->subject = $request->input('subject');
            $discussion->userId = $id;
            // Save Discussion
            $discussion->save();
                        
            // Create a new User2discussion
            $user2discussion = new User2discussion;
            $user2discussion->message = $request->input('message');
            $user2discussion->userId = $id;
            $user2discussion->discussionId = $discussion->id;
            // Save User2discussion
            $user2discussion->save();
            
            // Redirect
            return redirect('/')->with('success', 'Message Sent');
            
        } else {
            return redirect('/login')->with('fail', 'Wrong email');
        }
    }
    
    public function getDiscussion(){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        $discussions = Discussion::all();
        
        foreach($discussions as $discussion){
            $user = User::find($discussion->userId)->get();
            $discussion->userId = $user[0]->email;
        }

        return view('discussion')->with('discussions', $discussions);
    }
    
    public function getMessages(Request $request){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        $id = $request->input('id');
        $discussion = Discussion::find($id)->get()[0];
        $messages = User2discussion::where('discussionId', $id)->orderBy('timestamp')->get();

        foreach($messages as $message){
            $user = User::where('id', $message->userId)->get();
            $message->userId = $user[0]->email;
        }
                
        return view('messages', compact('messages','discussion'));
    }
    
    public function reply(Request $request){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        $id = $request->input('id');
        $discussion = Discussion::find($id);

        return view('reply')->with('discussion', $discussion);
    }
    
    public function submitReply(Request $request){
        if(!session()->get('id') && session()->get('role')!='secretary')
            return redirect('/')->with('fail', 'You are not logged in or you\'re not secretary');
        
        $id = $request->input('id');
        $userId = session()->get('id');
        
        // Create a new User2discussion
        $user2discussion = new User2discussion;
        $user2discussion->message = $request->input('message');
        $user2discussion->userId = $userId;
        $user2discussion->discussionId = $id;
        // Save User2discussion
        $user2discussion->save();
        
        // Redirect
        return redirect('/')->with('success', 'Reply Sent');
    }
}
