<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models;

use Validator;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Auth\User\ResetPassword\Helper::class);
    }

    public function reset_password(Request $request)
    {
        try {
            $passwordReset = Models\PasswordReset::where('token', $request->token)->first();

            if (!$passwordReset) {
                return view('auth.user.login');
            }

            return view('auth.user.passwords.reset');
        } catch (\Exception $e) {
            return view('auth.user.passwords.reset');
        }
    }

    public function post_reset_password(Request $request)
    {
        try {
            $rules = array(
                'password' => 'required|min:6|max:32',
                'token' => 'required',
            );

            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->JsonExport(403, __('Validation Error'));
            }
            
            return $this->instance->reset_password_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
