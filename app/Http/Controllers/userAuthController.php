<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\EmailVerify;
use Illuminate\Http\Request;
use App\Models\UserVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class userAuthController extends Controller
{
    // show register page
    public function registerShow(){
        return view('user.register');
    }

    // insetr user data
    public function registerGet(Request $request){
        // check register form validation
        $request->validate([
            'name' => 'required|max:55',
            'uname' => 'required|max:55|alpha_dash|unique:users,uname',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|max:150|confirmed',
        ],
        [
            'uname.required' => 'The user name field is required',
            'uname.alpha_dash' => 'The user name field must only contain letters, numbers, dashes, and underscores.',
            'uname.unique' => 'The user name has already been taken.',
        ]
        );
        // Insert user data into users table
        $insert = new User();
        $insert->name = $request->name;
        $insert->uname = $request->uname;
        $insert->email = $request->email;
        $insert->password = $request->password;
        $insert->save();

        // generate token
        $randToken = sha1(rand(10000,99999));
        $userVeri = new UserVerification();
        $userVeri->user_id = $insert->id;
        $userVeri->token = $randToken;
        $userVeri->save();

        // send mail for verify
        Mail::to(request('email'))->send(new EmailVerify($insert->id,$randToken));

        // return login page
        return to_route('loginShow')->with('registerSuccess', 'User register successfull, please verify your email');
    }

    // final userVeri
    public function emailVerify($user_id, $token){
        $findUser = UserVerification::where('user_id',$user_id)->where('token',$token);

        if($findUser->count() == 1){
            $findUser->delete();
            User::findOrFail($user_id)->update([
                'email_verified' => '1'
            ]);
            return redirect()->route('loginShow')->with('emailVerify', 'Successfully verified your email');
        }else{
            return 'Hacker Detected!';
        }
    }

    // show login page
    public function loginShow(){
        return view('user.login');
    }

    // loginGet
    public function loginGet(Request $request){
        // check login form validation
        $request->validate([
            'uname' => 'required|max:55|alpha_dash',
            'password' => 'required|max:150',
        ],
        [
            'uname.required' => 'The user name field is required',
            'uname.alpha_dash' => 'The user name field must only contain letters, numbers, dashes, and underscores.',
        ]);

        // user login
        if(Auth::attempt([
            'uname' => \request('uname'),
            'password' => \request('password'),
        ])){
            return to_route('index');
        }else{
            return redirect()->back()->with('login-fail', "Retry, brave soul! Login denied, but hope's not lost. Give it another shot and conquer the login realm!");
        };
    }

    // log out
    public function logout(){
        Auth::logout();
        return to_route('loginShow')->with('logoutMassage', 'You have successfully logged out. To continue your amazing journey, kindly lace up your digital boots and log back in. Your next adventure awaits!');
    }

}
