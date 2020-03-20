<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class LoginController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = Auth::guard('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return $this->JsonExport(200, 'Logout successfully.');
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }

    // public function user(Request $request)
    // {
    //     $user = Auth::user();

    //     if ($user) {
    //         return response($user, Response::HTTP_OK);
    //     }

    //     return response(null, Response::HTTP_BAD_REQUEST);
    // }

    // /**
    //  * Log out
    //  * Invalidate the token, so user cannot use it anymore
    //  * They have to relogin to get a new token
    //  *
    //  * @param Request $request
    //  */
    // public function logout(Request $request) {
    //     $this->validate($request, ['token' => 'required']);
        
    //     try {
    //         JWTAuth::invalidate($request->input('token'));
    //         return response()->json('You have successfully logged out.', Response::HTTP_OK);
    //     } catch (JWTException $e) {
    //         return response()->json('Failed to logout, please try again.', Response::HTTP_BAD_REQUEST);
    //     }
    // }

    // public function refresh()
    // {
    //     return response(JWTAuth::getToken(), Response::HTTP_OK);
    // }
}