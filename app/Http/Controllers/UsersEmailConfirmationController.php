<?php

namespace App\Http\Controllers;

use App\Mail\EmailConfirmation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UsersEmailConfirmationController extends Controller
{
    public function request(User $user)
    {
        if($user->isConfirmed()) {
            abort(404);
        }
        return view('request-email-confirmation', compact('user'));
    }

    public function sendEmail(User $user, Request $request)
    {
        $token = $user->getEmailConfirmationToken();

        Mail::to($user->email)->send(new EmailConfirmation($user, $token));
    }

    public function confirm(User $user, $token)
    {
        $userToConfirm = DB::table('users')
            ->where('email', $user->email)
            ->where('confirmation_token', $token)
            ->first();


        if(! $userToConfirm){
            return redirect()
                ->route('request.confirm.email', $user);
        }

       $userDone = DB::table('users')
           ->where('id',$userToConfirm->id)
           ->update(['is_confirmed' => true, 'confirmation_token' => null]);


        return redirect()->home();
    }
}
