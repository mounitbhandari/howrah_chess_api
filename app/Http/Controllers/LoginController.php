<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $requestData = (object)$request->json()->all();
        $user= User::whereEmail($requestData->email)->whereStatus(1)->first();
        if (!$user || !Hash::check($requestData->password, $user->password)) {
            return response()->json(['success'=>0,'data'=>null, 'message'=>'Wrong credential or user disabled'], 200,[],JSON_NUMERIC_CHECK);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->token = $token;
        return response()->json(['success'=>1,'data'=>new LoginResource($user), $token => $token], 200,[],JSON_NUMERIC_CHECK);
    }
}
