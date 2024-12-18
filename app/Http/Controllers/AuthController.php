<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function index(){
       return view('home_page');
    }
    public static function viewLogin(){
        return view('authentications/sign_in');
    }
    public static function viewRegister(){
        return view('authentications/sign_up');
    }
    public static function getUserLogin(){
        $user = User::all();
        return response()->json(
            [
                'message' => 'all user login.',
                'user' => $user
            ]
        );
    }
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
            'password' => bcrypt($request->password),
            'password_confirmation' => bcrypt($request->password),
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
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login successful!'], 200);
        }

        return response()->json(['message' => 'Invalid credentials!'], 401);
//         $request->validate([
//            'email' => 'required|string|email',
//            'password' => 'required|string',
//         ]);
//         $credentials = request(['email', 'password']);
//
//         if (!Auth::attempt($credentials)) {
//             return response()->json([
//                'message' => 'Unauthorized'
//             ], 401);
//        }
//
//        $user = $request->user();
//        $tokenResult = $user->createToken('authToken')->accessToken;
//
//        return response()->json([
//           'user' => Auth::user(),
//           'access_token' => $tokenResult,
//           'token_type' => 'Bearer',
//        ]);
    }
    //Logout User
    public static function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response()->json($response,200);
    }
}
