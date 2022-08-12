<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Invite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InviteController extends Controller
{
    public function invites(Invite $invite)
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

   

    public function chataction(Request $request)
    {   
        $user = Auth::user();

        if($request->id == $user->id){
            return response("Can't message yourself!");
        }

        /*
        $m = $user->invites()->create([             
            'chat_message' => $request->input('message'),
            'from_user_id' => $user->id,
            'to_user_id' => $request->input('id'),
            ]);     */

        return ['status' => 'Message Sent!'];
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
            'email' => $request->get('email'),
            'instrument' => $request->get('instrument'),
            'namen' => $request->get('namen'),
            'token' => $token
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

    public function accept($token)
    {
        // here we'll look up the user by the token sent provided in the URL

        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }
        // create the user with the details from the invite
        User::create(['email' => $invite->email]);
        // delete the invite so it can't be used again
        $invite->delete();
        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
        return 'Good job! Invite accepted!';

    }

    public function build()
    {
        return $this->from('you@example.com')
                    ->view('emails.invite');
    }
}
