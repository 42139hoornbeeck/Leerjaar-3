<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(AuthRequest $request)
    {
        $bestaandeemail = User::firstWhere('email', $request->email);

        if(!$bestaandeemail){
            $user = User::create([
                'name' =>  $request->name,
                'email' =>  $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'message' => 'Register succes'
            ]);

        } else {
            return response()->json([
                'message' => 'Email already exists'
            ]);
        }

    }


    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return response()->json($this->createToken($user, "token-" . $user->id . "-" . time()));
        } else {
            return abort(401, "Wrong credentials.");
        }
    }

    public function createToken(User $user, $token_name)
    {
        $token = $user->createToken($token_name);

        return ["token" => $token->plainTextToken, "name" => $user->name];
    }

}