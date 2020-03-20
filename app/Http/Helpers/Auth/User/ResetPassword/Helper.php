<?php

namespace App\Http\Helpers\Auth\User\ResetPassword;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models;
use App\Notifications\ResetPasswordRequest;

class Helper extends Controller
{
    public function reset_password_helper($request)
    {
        try {
            // check token
            $passwordReset = Models\PasswordReset::where('token', $request->token)->first();

            if (!$passwordReset) {
                return $this->JsonExport(401, 'Unauthorized error!');
            }

            if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
                $passwordReset->delete();
    
                return $this->JsonExport(422, 'This password reset token is invalid.');
            }

            $user = Models\MUser::where('email', $passwordReset->email)->first();

            if (!$user) {
                return $this->JsonExport(500, 'Internal Server Error!');
            }

            $updatePasswordUser = $user->update([
                'password' => bcrypt($request->password),
            ]);
            $passwordReset->delete();
            

            return $this->JsonExport(201,'Change password success.');
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
    
}
