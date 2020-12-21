<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signInPage()
    {
        return view('sign-in');
    }

    public function signUpPage()
    {
        return view('sign-up');
    }

    public function signIn(SignInRequest $request)
    {
        $input = $request->all();
        $User = User::where('email', $input['email'])->first();

        if (is_null($User)) {
            return redirect('/sign-in')->withErrors(['msg' => '請先註冊'])->withInput();
        }

        $isVerified = Hash::check($input['password'], $User->password);

        if (!$isVerified) {
            return redirect('/sign-in')
                ->withErrors('密碼驗證錯誤')
                ->withInput();
        }

        session()->put('user', $User->getAttributes());
        return redirect('/');
    }

    public function signUp(SignUpRequest $request)
    {
        $input = $request->all();

        $User = User::where('email', $input['email'])->first();

        if (!is_null($User)) {
            return redirect('/sign-up')
                ->withErrors('該信箱已註冊過')
                ->withInput();;
        }

        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect('/sign-in');
    }

    public function signOut()
    {
        session()->forget('user');

        return redirect('/sign-in');
    }
}
