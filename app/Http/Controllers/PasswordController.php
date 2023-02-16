<?php

namespace App\Http\Controllers;

use App\Models\User;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function getForgot()
    {
        return view('forgot-password.forgot_password');
    }

    public function postForgot(Request $request)
    {
        $mk = mt_rand(10000000, 99999999);
        $pass = bcrypt($mk);

        $email = $request->get('email');
        // update database pass where email
        $user = User::where('email', $email)->first();
        
        if(!empty($user)) {
            User::where('email', $email)
            ->update(['password' => $pass]);
            // send mail
            Mail::send('forgot-password.email', array('password' => $mk), function ($message) use ($email) {
                $message->to($email)->subject('Forgot password');
            });

            return redirect()->route('login');
        } else {
            return redirect()->back()->withErrors('Email không tồn tại.');
        }
    }




    public function changePassword()
    {

        return view('change-password.change_password');
    }
    public function updatePassword(Request $request)
    {

         $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

            
        ]);



        
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Mật khẩu cũ không khớp");
            
        }
        User::whereId(auth()->user()->id)->update([
            'password' =>  bcrypt($request->new_password)
        ]);

        return back()->with("status", "Đổi mật khẩu thành công!");
        
    }
}
