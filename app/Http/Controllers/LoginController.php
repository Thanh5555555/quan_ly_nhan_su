<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Get Login function
     *
     * @return void
     */
    public function getLogin()
    {
        return view('login.index');
    }

    /**
     * Show the application loginprocess.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        // Validate Data Input
        $validated = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check Account
        if (auth()->attempt($validated)) {
            $user = auth()->user();

            return redirect()->route('dashboard.index');
        }

        // return back()->with('error', 'your username and password are wrong.')
        //     ->withInput();
            return redirect()->back()->withInput()->withErrors('Sai email hoặc password.');
    }


    /**
     * Show the application logout.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Auth::guard('admin')->logout();

        // // $request->session()->invalidate();

        // // $request->session()->regenerateToken();
        auth()->logout();
        // // auth()->guard('admin')->logout();
        // // \Session::flush();
        // Session::put('success', 'You are logout successfully');
        return view('login.index');
    }
}
