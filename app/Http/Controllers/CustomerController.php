<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
    public function zero(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = User::find($update_id);
            $items->status = 0;
            $items->save();
            return redirect()->back()->with('success', 'Leave Updated Successfully!');
        }
    }
    public function CustomersID($id)
    {
        $Customers = User::where('id', $id)->get();
        
        if(!empty($Customers))
        {
            $response = ['status' => true, 'Customers' => $Customers];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'Customers' => 'null'];
            return response($response, 500);
        }
    }
    public function Customers()
    {
        $Customers = User::get();
        
        if(!empty($Customers))
        {
            $response = ['status' => true, 'Customers' => $Customers];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'Customers' => 'null'];
            return response($response, 500);
        }
    }
    public function one(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = User::find($update_id);
            $items->status = 1;
            $items->save();
            return redirect()->back()->with('success', 'Leave Updated Successfully!');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
