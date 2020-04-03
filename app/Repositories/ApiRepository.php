<?php


namespace App\Repositories;

use App\Admin\Constructor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            $response['access_token'] = $user->remember_token;
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
                'message' => 'Successfully Logout',
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


    public function reset_password(Request $request){
        $remember_token  = $request->input('_token');
        $email = $request->input('email');
        $password = $request->input('pass');
        $checkUser = User::where('email','=',$email)->first();

        if(!empty($checkUser)){
            if ($checkUser->remember_token == $remember_token){
                $data['password'] = Hash::make($password);
                if ($checkUser->update($data)){
                    $response = array();
                    $response['error'] = false;
                    $response['message'] = "Password Reset Successfully Done";
                    return $response;
                }
            }else{
                $response = array();
                $response['error'] = true;
                $response['message'] = "Token invalid";
                return $response;
            }
        }
        $response = array();
        $response['error'] = true;
        $response['message'] = "Credential don't match";
        return $response;
    }

}
