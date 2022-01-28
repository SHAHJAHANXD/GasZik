<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_drivers');
    }
    public function getAll()
    {
        $driver = driver::get()->all();

        if (!empty($driver)) {
            $response = ['status' => true, 'drivers' => $driver];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'drivers' => ''];
            return response($response, 400);
        }
    }
    public function Driver_id($id)
    {
        $driver = driver::find($id)->get();

        if (!empty($driver)) {
            $response = ['status' => true, 'drivers' => $driver];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'drivers' => 'null'];
            return response($response, 500);
        }
    }
    public function online()
    {
        $driver = driver::where('status', 'Active')->get();

        if (!empty($driver)) {
            $response = ['status' => true, 'drivers' => $driver];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'drivers' => 'null'];
            return response($response, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storee(Request $request)
    {
        $imageName = time() . '.' . $request->url->extension();
        $userr = new driver();
        $userr->license = $imageName;
        $userr->save();
        $request->url->move(public_path('images'), $imageName);
    }
    public function info(Request $request)
    {

        $driver = new driver();
        $imageName = time() . rand(1, 100) . '.' . $request->licensePhoto->extension();
        if ($request->hasfile('licensePhoto')) {
            $driver->license = $imageName;
            $request->licensePhoto->move(public_path('images'), $imageName);
        }
        $imageName = time() . rand(1, 100) . '.' . $request->motoreVhicleLicense->extension();
        if ($request->hasfile('motoreVhicleLicense')) {
            $driver->vehicle = $imageName;
            $request->motoreVhicleLicense->move(public_path('images'), $imageName);
        }

        $driver->userId = $request->userId;
        $driver->fname = $request->firstName;
        $driver->lname = $request->lastName;
        $driver->card_no = $request->idCardNumber;
        $driver->company = $request->companyName;
        $driver->save();
        return redirect()->back()->with('Success', 'Driver Added Successfully!');
    }
    public function store(Request $request)
    {

        $driver = new driver();
        $imageName = time() . rand(1, 100) . '.' . $request->url->extension();
        if ($request->hasfile('url')) {
            $driver->license = $imageName;
            $request->url->move(public_path('images'), $imageName);
        }
        $imageName = time() . rand(1, 100) . '.' . $request->url1->extension();
        if ($request->hasfile('url1')) {
            $driver->vehicle = $imageName;
            $request->url1->move(public_path('images'), $imageName);
        }
        $driver->email = $request->email;
        $driver->number = $request->number;
        $driver->password = Hash::make($request->password);
        $driver->fname = $request->fname;
        $driver->lname = $request->lname;
        $driver->card_no = $request->card_no;
        $driver->company = $request->company;
        $driver->save();
        return redirect()->back()->with('Success', 'Driver Added Successfully!');
    }
    public function zero(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = driver::find($update_id);
            $items->status = 0;
            $items->save();
            return redirect()->back()->with('success', 'Leave Updated Successfully!');
        }
    }
    public function one(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = driver::find($update_id);
            $items->status = 1;
            $items->save();
            return redirect()->back()->with('success', 'Leave Updated Successfully!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {
        //
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required',
            'password' => 'required|string|min:5',
        ]);
        if ($validator->fails()) {
            return response(['status' => false, 'errors' => $validator->errors()->all()], 422);
        }
        $user = driver::where('number', $request->number)->first();
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
    public function updateProfile(Request $request)
    {
        $driver = driver::find(Auth::guard('api')->user()->id);
        if (isset($driver) && !empty($driver)) {
            $imageName = time() . rand(1, 100) . '.' . $request->url->extension();
            if ($request->hasfile('url')) {
                $driver->license = $imageName;
                $request->url->move(public_path('images'), $imageName);
            }
            $imageName = time() . rand(1, 100) . '.' . $request->url1->extension();
            if ($request->hasfile('url1')) {
                $driver->vehicle = $imageName;
                $request->url1->move(public_path('images'), $imageName);
            }

            $driver->number = $request->number;
            $driver->fname = $request->fname;
            $driver->lname = $request->lname;
            $driver->card_no = $request->card_no;
            $driver->company = $request->company;
            $driver->save();

            $response = ['status' => true, 'message' => "Driver Profile Updated Successfully!"];
            return response($response, 200);
        }
    }
    public function update(Request $request)
    {
        $user = driver::find(Auth::guard('api')->user()->id);

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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $driver)
    {
        
    }
}
