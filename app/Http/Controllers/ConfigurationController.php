<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexx($id)
    {
        $user = Configuration::find($id);
        return view('admin.configuration', compact('user'));
    }
    public function index()
    {
        return view('admin.configuration');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function configurations()
    {
        $items = Configuration::orderBy('id', 'desc')->get();
        if(!empty($items))
        {
            foreach($items as $key => $value)
            {
                $items[$key]['time'] = $value->created_at->diffForHumans();
            }
            $response = ['status' => true, 'items' => $items];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'items' => ''];
            return response($response, 400);
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
        $update_id = $request->id;
        if (isset($update_id) && !empty($update_id)) {

            $user = Configuration::find($update_id);
            $user->ServiceCharges = $request->ServiceCharges;
            $user->DeliveryCharges = $request->DeliveryCharges;
            $user->Tax = $request->Tax;
            $user->MinimumRadius = $request->MinimumRadius;
            $user->MaximumRadius = $request->MaximumRadius;
            $user->MinimumOrder = $request->MinimumOrder;
            $user->DeliveryTime = $request->DeliveryTime;
            $user->SupportContact = $request->SupportContact;
            $user->SupportEmail = $request->SupportEmail;
            $user->DeliveryTimeIncreasePerOrder = $request->DeliveryTimeIncreasePerOrder;
            $user->save();
            return redirect()->back()->with('Success', 'Account Upated Successfully!');
        } else {
        $user =  new Configuration();
        $user->ServiceCharges = $request->ServiceCharges;
        $user->DeliveryCharges = $request->DeliveryCharges;
        $user->Tax = $request->Tax;
        $user->MinimumRadius = $request->MinimumRadius;
        $user->MaximumRadius = $request->MaximumRadius;
        $user->MinimumOrder = $request->MinimumOrder;
        $user->DeliveryTime = $request->DeliveryTime;
        $user->SupportContact = $request->SupportContact;
        $user->SupportEmail = $request->SupportEmail;
        $user->DeliveryTimeIncreasePerOrder = $request->DeliveryTimeIncreasePerOrder;
        $user->save();
        return redirect()->back()->with('Success', 'Account Upated Successfully!');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function show(Configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuration $configuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuration $configuration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $configuration)
    {
        //
    }
}
