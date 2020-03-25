<?php


namespace App\Repositories;


use App\Admin\Constructor;
use App\Helper\Base;
use App\Helper\Common;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ConstructorRepository extends Common implements Base
{

    public function index()
    {
        // TODO: Implement create() method.
        return Constructor::where('available',true)->get();
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.


        if (empty($request->constructor_id)){
            $this->validator($request->all())->validate();
        }

        $image = "";

        $dir = "Constructor_Image";
        if (!empty($request->file('photo'))){
            $image =  $this->save_file($request->file('photo'), $dir);
        }

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['role'] = 'constructor';
        $user['password'] = Hash::make($request->password);

        $constructor['phone'] = $request->phone;
        $constructor['photo'] = $image;
        $constructor['national_id'] = $request->national_id;
        $constructor['address'] = $request->address;

        if (!empty($request->constructor_id)){

            $isAvailable = Constructor::find($request->constructor_id);
            if (!empty($isAvailable)){
                if (empty($image)){
                    $constructor['photo'] = $isAvailable->photo;
                }
                else{
                    File::delete($isAvailable->photo);
                }
                if (empty($request->role))
                {
                    $user['role'] = $isAvailable->role;
                }

                $isAvailable->update($constructor);
                User::find($isAvailable->user_id)->update($user);
                return 'success';
            }
            else{
                return 'error';
            }
        }
        else{
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->role = 'constructor';
            $newUser->email_verified_at = now();
            $newUser->password = Hash::make($request->password);
            $newUser->remember_token = Str::random(1);

            if ($newUser->save()){
                $constructor['user_id'] = $newUser->id;
                if (Constructor::create($constructor)) {
                    return 'success';
                }
            }else{
                return 'error';
            }
        }

    }


    public function store_from_api(Request $request)
    {
        // TODO: Implement store() method.



        $image = "";

        $dir = "Constructor_Image";
        if (!empty($request->file('photo'))){
            $image =  $this->save_file($request->file('photo'), $dir);
        }
        $checkEmail = User::where('email', $request->input('email'))->first();


        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['role'] = 'constructor';
        $user['password'] = Hash::make($request->password);

        $constructor['phone'] = $request->phone;
        $constructor['photo'] = $image;
        $constructor['national_id'] = $request->national_id;
        $constructor['address'] = $request->address;

        if (!empty($request->constructor_id)){
            ;
            $isAvailable = Constructor::find($request->constructor_id);
            if (!empty($isAvailable)){
                if (empty($image)){
                    $constructor['photo'] = $isAvailable->photo;
                }
                else{
                    File::delete($isAvailable->photo);
                }
                if (empty($request->role))
                {
                    $user['role'] = $isAvailable->role;
                }

                $isAvailable->update($constructor);
                User::find($isAvailable->user_id)->update($user);
                $response['error'] = false;
                $response['message'] = "Updated Successfully";
                return $response;
            }
            else{
                $response = array();
                $response['error'] = true;
                $response['message'] = "Process Failed ! No User Found";
                return $response;
            }
        }
        else{
            if (!empty($checkEmail)) {
                $response = array();
                $response['error'] = true;
                $response['message'] = "Email Already Exist";
                return $response;
            }
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->role = 'constructor';
            $newUser->email_verified_at = now();
            $newUser->password = Hash::make($request->password);
            $newUser->remember_token = Str::random(1);

            if ($newUser->save()){
                $constructor['user_id'] = $newUser->id;
                if (Constructor::create($constructor)) {
                    $response = array();
                    $response['error'] = false;
                    $response['message'] = "Registered Successfully";
                    return $response;
                }
            }
            else{
                $response = array();
                $response['error'] = true;
                $response['message'] = "Registeration Process Failed";
                return $response;
            }
        }

    }
    public function show(Model $model)
    {
        // TODO: Implement show() method.
        return Constructor::with('user')->where('id','=', $model->id)->first();
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
        $isAvailable = Constructor::find($model->id);
        if (!empty($isAvailable)){
            User::find($isAvailable->user_id)->delete();
        }
        return Constructor::find($model->id)->delete();
    }

    public function all_constructors(){
        return Constructor::with('user')->get();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'national_id' => ['required', 'max:19'],
            'phone' => ['required', 'max:11'],
            'address' => ['required'],

        ]);
    }


}
