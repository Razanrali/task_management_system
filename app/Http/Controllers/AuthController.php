<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogUserRequest;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;


class AuthController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            'ID_num'=>['required','min:5','max:8'],
            'password' => ['required','min:6'],
            'remember_token'=>['boolean']
        ]);

        $temp=$request->only(['ID_num','password']);

        if(!Auth::attempt($temp))
        {
            return \response()->json(['message'=>'Unauthorized'],401);
        }

        $user=Auth::user();
        $tokenResult = $user->createToken('personal access token');//this is to create user token
        $data['user'] = $user; //store the info about the user that login to application
        $data['typeToken'] = 'Bearer'; //this is the type of the token
        $data['token'] = $tokenResult->accessToken;
        return \response()->json(['message:'=>'login done','the user:'=>$data],200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message'=>'successfully logged out']);
    }




}
