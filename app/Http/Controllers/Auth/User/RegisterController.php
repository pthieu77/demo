<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Auth\User\Register\Helper::class);
    }

    public function register(Request $request)
    {
        try {
            $user = auth()->user();

            if (Auth::check()) {
                if (Auth::user()->isUser()) {
                    return redirect()->route('user.page.account.index');
                }

                Auth::logout();
            }

            return view('auth.user.register');
        } catch (\Exception $e) {
            return view('auth.user.register');
        }
    }

    public function post_register(Request $request)
    {
        try {
            $rules = array(
                'user_name' => 'required|min:3|max:16',
                'password' => 'required|min:6|max:32',
                'email' => 'required|email',
            );
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->JsonExport(403, __('Validation Error'));
            }
            
            return $this->instance->register_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
