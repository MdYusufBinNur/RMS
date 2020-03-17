<?php


namespace App\Repositories;

use App\Admin\Constructor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiRepository
{
    public function sign_in(Request $request)
    {
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('pass')])) {
            // Authentication passed...
            $user = auth()->user();
            $user->remember_token = Str::random(60);
            $user->save();

            $response = array();
            $response['error'] = false;
            $response['message'] = "Login Successful";
            if ($user->role == "member"){
                $response['user'] = $user->member;
            }
            if ($user->role == "constructor"){
                $response['user'] = $user->constructor;
            }
            $response['user'] = $user;
            $response['access_token'] = $user->createToken('authToken')->accessToken;
            //$data = json_encode($response)
            return response()->json($response,200);
        }
        $response = array();
        $response['error'] = true;
        $response['message'] = "Credential don't match";
        $response['user'] = "No User";

        return response()->json($response, 401);
    }

    public function logout()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $user->remember_token = null; // clear  token
            $user->save();

            return response()->json([
                'message' => 'Thank you for using our application',
            ]);
        }

        return response()->json([
            'error' => 'Unable to logout user',
            'code' => 401,
        ], 401);
    }

    public function register(Request $request)
    {
        return response()->json([
            'error' => 'Unable to logout user',
            'code' => 401,
        ], 401);
    }



}
