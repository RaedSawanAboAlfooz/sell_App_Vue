<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{





    public function __construct()
    {
        // all function with auth only login and register without auth
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }






    public function login($status=true)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token,$status);
    }


    public function register(Request $request)
    {
        $val = $request->validate([
            'name' => ['required', 'max:30'],
            'password' => ['required', 'min:8'],
            'email' => ['required', 'email']
        ]);
        $user = User::where('email', '=', $request->get('email'))->first();
        if ($user != null) {
            return response()->json( ['error'=>'Account already Exists!!' , 'status'=>false]);
        }

        $user =  User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return $this->login(request(),true);
    }







    public function me()
    {
        return response()->json(auth()->user());
    }






    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }








    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }





    protected function respondWithToken($token,$stats=true)
    {
        return response()->json([
            'status'=>$stats,
            'access_token' => $token,
            // 'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
