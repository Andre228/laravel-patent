<?php

namespace App\Http\Controllers\Museum;

use App\Mail\EmailConfirmation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserContactController extends BaseController
{
    public function userMessage(Request $request)
    {

        $login = $request->name;
        $email = $request->email;
        $message = $request->message;

        $data =  [
            'login' => $login,
            'email' => $email,
            'bodyMessage' => $message
        ];

        $user = DB::table('users')->select('email')->where('email', $email)->first();

        if($user){
            Mail::send('mails.email-user-issue',$data, function ($message) use ($email, $login) {
                $message->from($email, 'Your Application');
                $message->to('museum63rf@gmail.com')->subject('Новое Сообщение от пользователя - ' . $login);
            });

            return redirect()
                ->route('contact')
                ->with(['success' => 'Успешно отправлено']);
        }

        else {
            return back()
                ->withErrors(['msg' => 'Такого пользователя не существует :('])
                ->withInput();
        }

    }

    public function subscribe(Request $request)
    {
        $email = $request->email;

        $user = DB::table('users')->select('email','name')->where('email', $email)->first();




        if($user) {

            $login = $user->name;
            $data =  [
                'login' => $login,
                'email' => $email,
            ];

            Mail::send('mails.user-subscribe-isdone',$data, function ($message) use ($email, $login) {
                $message->from('museum63rf@gmail.com', 'Museum63rf');
                $message->to($email)->subject('Вы подписались на обновления');
            });


            DB::table('users')->where('email', $email)->update(['is_subscribe' => true]);

            return redirect()
                ->route('contact')
                ->with(['success' => 'Успешно отправлено']);
        }

        else {
            return back()
                ->withErrors(['msg' => 'Такого пользователя не существует :('])
                ->withInput();
        }
    }

}
