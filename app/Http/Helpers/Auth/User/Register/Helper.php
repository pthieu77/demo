<?php

namespace App\Http\Helpers\Auth\User\Register;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use App\Models;

class Helper extends Controller
{
    public function register_helper($request)
    {
        try {
            // check user name is exist
            $account = Models\MUser::where('name', $request->user_name);

            if ($account->count() > 0) {
                return $this->JsonExport(400, 'Username already exists.');
            }
            
            // check email is exist
            $account = Models\MUser::where('email', $request->email);

            if ($account->count() > 0) {
                return $this->JsonExport(400, 'Email already exists.');
            }

            $data = [
                'name' => $request->user_name,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'status' => 0,
                'role_id' => 2,
            ];

            $create_account = Models\MUser::insert($data);

            if (!$create_account) {
                return $this->JsonExport(500, 'Internal Server Error!');
            }

            return $this->JsonExport(201,'register successfully');
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
    
}
