<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function login()
    {
        $pageTitle = 'Admin - Login';

        if (Auth::check() && (Auth::user()->user_role_id == 1)) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::check()) {
            return redirect()->route('main.page');
        }

        return view('admin.auth.login', compact('pageTitle'));
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role_id' => 1])) {
            // Authentication passed...
            return redirect()->route('admin.dashboard');
        } else {
            $errors = new MessageBag(['email' => ['These credentials do not match our records.']]);
            return back()->withErrors($errors)->withInput(Input::except('password'));
        }
    }
}
