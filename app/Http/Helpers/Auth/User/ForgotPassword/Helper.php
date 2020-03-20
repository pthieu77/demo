<?php

namespace App\Http\Helpers\Auth\User\ForgotPassword;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models;
use App\Notifications\ResetPasswordRequest;

class Helper extends Controller
{
    public function forgot_password_helper($request)
    {
        try {
            
            // check email is exist
            $account = Models\MUser::where('email', $request->email)->first();

            if (!$account) {
                return $this->JsonExport(400, 'Email not exists.');
            }

            $passwordReset = Models\PasswordReset::updateOrCreate([
                'email' => $account->email,
            ], [
                'token' => Str::random(60),
            ]);

            if (!$passwordReset) {
                return $this->JsonExport(500,'Internal Server Error!');
            }

            $account->notify(new ResetPasswordRequest($passwordReset->token));

            return $this->JsonExport(201,'We have e-mailed your password reset link!');
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
    
}
