<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    //Register User
    public static function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json(
            [
                'massage' => 'Successfully created user!'
            ],201
        );
    }
    //Login User
    public static function login(Request $request){
        //login user with passport
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(
                [
                    'error_message' => 'Incorrect Details. Please try again'
                ]
            );
        }
        $token = auth()->user()->createToken('API Token')->accessToken;
        return response(
            ['user' => auth()->user(), 'token' => $token]
        );
    }
    //Logout User
    public static function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response()->json($response,200);
    }
}
