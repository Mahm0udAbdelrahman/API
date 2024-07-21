<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validation =  Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:' .User::class,
                'password' => 'required|confirmed',
            ],
            [
                'name.required' => 'يعم متعبنااااش',
            ],
            [
                'name' => 'My Name'
            ]
        );

        if($validation->fails())
        {
            return ApiResource::getResponse(422,'يعم ركز' ,$validation->messages()->all());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['password'] = $user->password;
        $data['token'] = $user->createToken($request->token_name)->plainTextToken;

        return ApiResource::getResponse(201,' الدنيا تمام التمام' ,$data);


    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResource::getResponse(200,' الدنيا تمام التمام' ,[]);


    }

    public function login(Request $request)
    {
        $validation =  Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'name.required' => 'يعم متعبنااااش',
            ],
            [
                'name' => 'My Name'
            ]
        );

        if($validation->fails())
        {
            return ApiResource::getResponse(422,'يعم ركز' ,$validation->messages()->all());
        }
        if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password ] ))
        {
            $user = Auth::user();
            $data['email'] = $user->email;
            $data['token'] = $user->createToken($request->token_name)->plainTextToken;
            return ApiResource::getResponse(200,'1000 1000 الدنيا تمام التمام' ,$data);
        }else{
            $old['email'] = $request->email;
            $old['password'] = $request->password;

            return ApiResource::getResponse(401,'User data is not match' ,$old);
        }



    }
}
