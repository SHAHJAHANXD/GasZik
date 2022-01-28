<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Configuration;
use App\Models\driver;
use App\Models\OnGoingOrders;
use App\Models\User;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $drivers = DB::table('drivers')->count();
        $items = DB::table('items')->count();
        $ongoing = DB::table('on_going_orders')->count();
        
        return View('admin.index', compact('users', 'drivers', 'items','ongoing'));
    }
    public function drivers()
    {
        $driver = driver::get()->all();
        return View('admin.drivers', compact('driver'));
    }
    public function items()
    {
        $items = Items::get()->all();
        return View('admin.items', compact('items'));
    }
    public function customers()
    {
        $user = User::get()->all();
        return View('admin.customers', compact('user'));
    }
    public function ongoing_orders()
    {
        $driver = driver::get()->all();
        $order = OnGoingOrders::get()->all();
        return View('admin.ongoing_orders', compact('order','driver'));
    }
    public function all_orders()
    {
        return View('admin.all_orders');
    }
    public function configuration()
    {
        $driver = Configuration::get()->all();
        return View('admin.config',compact('driver'));
    }
    public function templates()
    {
        return View('admin.templates');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Configuration::get();
        return view('admin.layouts.sidebar', compact('user'));
    }
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);
        if ($validator->fails()) {
            return response(['status' => false, 'errors' => $validator->errors()->all()], 422);
        }
        $user = Admin::where('email', $request->email)->first();
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
        $user = Admin::find(Auth::guard('api')->user()->id);

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
            $response = ['status' => false, 'message' => "Old Password is Incorrect!"];
            return response($response, 200);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        }
        return redirect()->route('admin.login')->with('error','Email or Password is Invalid!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin-login');
    }
}
