<?php

namespace App\Http\Controllers;

use App\Models\Glasbenaskupina;
use App\Models\User;
use App\Models\Invite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InviteController extends Controller
{
    public function invites()
    {
        return view('invites.show',[
            'invites' => Invite::all()
        ]);
    }

    //Show invite form with usermail
    public function inviteuser(User $user) {
        return view('users.invite', [
            'users' => $user
        ]);
    }

    //Show invite form with usermail
    public function inviteToGroup(User $user, Glasbenaskupina $group) {
        return view('users.invite', [
            'users' => $user,
            'group' => $group
        ]);
    }
    
    public function store(Request $request)
    {
        do {
            //generate a random string using Laravel's str_random helper
            $token = Str::random(10);

        } //check if the token already exists and if it does, try again

        while (Invite::where('token', $token)->first());
        //create a new invite record
        $invite = Invite::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'group_id' => $request->group_id,
            'email' => $request->get('email'),
            'sender_email' => Auth::user()->email,
            'instrument' => $request->get('instrument'),
            'namen' => $request->get('namen'),
            'token' => $token,
            'status' => "prejeto"
        ]);

        return redirect('/')->with('message', 'Povabilo uspešno poslano!');


        /*
        // process the form submission and send the invite by email
        do {
            //generate a random string using Laravel's str_random helper
            $token = Str::random(10);

        } //check if the token already exists and if it does, try again

        while (Invite::where('token', $token)->first());
        //create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token
        ]);
        */
        // send the email
        //Mail::to($request->get('email'))->send(new InviteCreated($invite));


        // redirect back where we came from
        //return redirect('/')->with('message', 'Invite send');
    }

    public function accept(Invite $invite)
    {
        do {
            //generate a random string using Laravel's str_random helper
            $token = Str::random(10);

        } //check if the token already exists and if it does, try again

        while (Invite::where('token', $token)->first());
        //create a new invite record
        $newinvite = Invite::create([
            'sender_id' => $invite->sender_id,
            'receiver_id' => $invite->receiver_id,
            'group_id' => $invite->group_id,
            'email' => $invite->email,
            'sender_email' => $invite->sender_email,
            'instrument' =>$invite->instrument,
            'namen' => $invite->namen,
            'token' => $token,
            'status' => "potrjeno"
        ]);

        
   
        $invites = Invite::all();
        $invite = $invites->find($invite->id);
        $invite -> delete();
        
        return redirect('/invites')->with('message', 'Invite deleted');
        

    }

    public function dump(Invite $invite)
    {
        $invites = Invite::all();
        $invite = $invites->find($invite->id);
        $invite -> delete();
        
        return redirect('/invites')->with('message', 'Invite deleted');
    }


}
