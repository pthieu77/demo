<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Validator;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Auth\User\ForgotPassword\Helper::class);
    }

    public function forgot_password(Request $request)
    {
        try {
            $user = auth()->user();

            if (Auth::check()) {
                if (Auth::user()->isUser()) {
                    return redirect()->route('user.page.account.index');
                }

                Auth::logout();
            }

            return view('auth.user.passwords.email');
        } catch (\Exception $e) {
            return view('auth.user.passwords.email');
        }
    }

    public function post_forgot_password(Request $request)
    {
        try {
            $rules = array(
                'email' => 'required|email',
            );
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->JsonExport(403, __('Validation Error'));
            }
            
            return $this->instance->forgot_password_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
