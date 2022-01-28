<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        
        $address = new UserAddress();
        $address->address = $request->address;
        $address->addressAr = $request->addressAr;
        $address->addressType = $request->addressType;
        $address->addressTypeAr = $request->addressTypeAr;
        $address->latlong = $request->latlong;
        $address->houseNumber = $request->houseNumber;
        $address->building = $request->building;
        $address->landMark = $request->landMark;
        $address->lan = $request->lan;
        $address->user_id = Auth::guard('api_user')->user()->id;
        $address->save();
        $response = ['status' => false, 'message' => "Address Saved Successfully!"];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = UserAddress::find($id);
        $delete->delete();
        $response = ['status' => false, 'message' => "Address Delete Successfully!"];
        return response($response, 200);
    }
}
