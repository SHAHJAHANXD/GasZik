<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);
        if ($validator->fails()) {
            return response(['status' => false, 'errors' => $validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['status' => true, 'message' => "LoggedIn success!", 'token' => $token, 'data' => $user];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);

        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'min:6|different:password',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $response = ['status' => true, 'message' => "Password Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Password is Invalid!"];
            return response($response, 200);
        }
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        if (isset($user) && !empty($user)) {
            $imageName = time() . '.' . $request->image->extension();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imageName;
            $user->address = $request->address;
            $user->latlong = $request->latlong;
            $user->user_id = Auth::guard('api')->user()->id;
            $user->lan = $request->lan;
            $user->save();
            $request->image->move(public_path('images'), $imageName);
            $response = ['status' => true, 'message' => "User Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Parameters is not valid!"];
            return response($response, 402);
        }
    }
}
