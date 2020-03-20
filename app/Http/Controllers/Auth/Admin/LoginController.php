<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Auth\Admin\Login\Helper::class);
    }

    public function login(Request $request)
    {
        try {
            $user = auth()->user();

            if (Auth::check()) {
                if (Auth::user()->isAdmin()) {
                    return redirect()->route('admin.page.index');
                }

                Auth::logout();
            }

            return view('auth.admin.login');
        } catch (\Exception $e) {
            return view('auth.admin.login');
        }
    }

    public function post_login(Request $request)
    {
        try {
            $rules = array(
                'user_name' => 'required|min:3|max:16',
                'password' => 'required|min:6|max:32',
            );
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->JsonExport(403, __('Validation Error'));
            }
            
            return $this->instance->login_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }

    public function post_logout(Request $request)
    {
        try {
            Auth::logout();
            
            return $this->JsonExport(200, 'Logout successfully');
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
