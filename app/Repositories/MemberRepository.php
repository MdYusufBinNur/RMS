<?php


namespace App\Repositories;


use App\Admin\Member;
use App\Helper\Base;
use App\Helper\Common;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MemberRepository extends Common implements Base
{

    public function index()
    {
        // TODO: Implement create() method.
        return Member::with('user')->get();
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.

        //return $request;
        $checkEmail = User::where('email', $request->input('email'))->first();
        $image = "";

        $dir = "Member_Image";
        if (!empty($request->file('photo'))) {
            $image = $this->save_file($request->file('photo'), $dir);
        }
        $member['phone'] = $request->phone;
        $member['photo'] = $image;
        $member['national_id'] = $request->national_id;
        $member['address'] = $request->address;

        if (!empty($request->member_id)) {
            $isAvailable = Member::find($request->input('member_id'));
            if (!empty($isAvailable)) {
                if (empty($image)) {
                    $member['photo'] = $isAvailable->photo;
                } else {
                    File::delete($isAvailable->photo);
                }

                $isAvailable->update($member);
                $response = array();
                $response['error'] = false;
                $response['message'] = "Updated Successfully";
                return $response;
            } else {
                $response = array();
                $response['error'] = true;
                $response['message'] = "Failed to Register";
                return $response;
            }
        } else {

            if (empty($checkEmail)) {
                $newUser = new User();
                $newUser->name = $request->input('name');
                $newUser->email = $request->input('email');
                $newUser->role = 'user';
                $newUser->email_verified_at = now();
                $newUser->password = Hash::make($request->input('password'));
                $newUser->remember_token = Str::random(10);

                if ($newUser->save()) {
                    $member['user_id'] = $newUser->id;
                    if (Member::create($member)) {
                        $response = array();
                        $response['error'] = false;
                        $response['message'] = "Registered Successfully";
                        return $response;
                    }
                } else {
                    $response = array();
                    $response['error'] = true;
                    $response['message'] = "Email Already Exist";
                    return $response;
                }

            } else {
                $response = array();
                $response['error'] = true;
                $response['message'] = "Failed to Register";
                return $response;
            }
        }

        $response = array();
        $response['error'] = true;
        $response['message'] = "Try Again";
        return $response;
    }

    public function show(Model $model)
    {
        // TODO: Implement show() method.
        return Member::with('user')->where('id', '=', $model->id)->first();
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
        return Member::find($model->id)->delete();
    }
    public function all_members(){
        return Member::with('user')->get();
    }
}
