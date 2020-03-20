<?php

namespace App\Http\Helpers\Auth\Admin\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class Helper extends Controller
{
    public function login_helper($request)
    {
        try {

            $credentials = [
                'name' => $request->user_name,
                'password' => $request->password,
            ];
            
            if (!Auth::attempt($credentials, true)) {
                return $this->JsonExport(403, 'You have entered an invalid username or password!');
            }

            if (!Auth::user()->isAdmin()) {
                Auth::logout();

                return $this->JsonExport(403, 'Forbidden Error!');
            }
            
            return $this->JsonExport(200,'Login successfully');
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
    
}
