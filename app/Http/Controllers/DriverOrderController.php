<?php

namespace App\Http\Controllers;

use App\Models\DriverOrder;
use Illuminate\Http\Request;

class DriverOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        //
    }
    public function driver_id($DriverId)
    {
        $items = DriverOrder::find($DriverId)->get();

        if(!empty($items))
        {
            $response = ['status' => true, 'items' => $items];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'items' => ''];
            return response($response, 400);
        }

    }
    public function OrderId($id)
    {
        $OrderId = DriverOrder::where('id', $id)->get('DriverId');
        
        if(!empty($OrderId))
        {
            $response = ['status' => true, 'OrderId' => $OrderId];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'OrderId' => 'null'];
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
    public function store(Request $request)
    {
        $order = new DriverOrder();
        $order->OrderId = $request->OrderId;
        $order->DriverId = $request->DriverId;
        $order->Latlong = $request->Latlong;
        $order->Latitude = $request->Latitude;
        $order->Longitude = $request->Longitude;
        $order->save();
        $response = ['status' => true, 'message' => "Order Added successfully!"];
        return response($response, 200);
    }
    public function status(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = DriverOrder::find($update_id);
            $items->status = $request->status;
            $items->save();
            $response = ['status' => true, 'message' => "Status Updated Successfully!"];
            return response($response, 200);
        }
    }
    public function otw(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = DriverOrder::find($update_id);
            $items->status = 'On The Way';
            $items->save();
            $response = ['status' => true, 'message' => "Status Updated Successfully!"];
            return response($response, 200);
        }
    }
    public function Delivered(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = DriverOrder::find($update_id);
            $items->status = 'Delivered';
            $items->save();
            $response = ['status' => true, 'message' => "Status Updated Successfully!"];
            return response($response, 200);
        }
    }
    public function driverId($DriverId)
    {
        $Orders = DriverOrder::where('DriverId' , $DriverId)->get();

        if(!empty($Orders))
        {
            $response = ['status' => true, 'Orders' => $Orders];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'Orders' => ''];
            return response($response, 400);
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DriverOrder $driverOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverOrder $driverOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverOrder $driverOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverOrder $driverOrder)
    {
        //
    }
}
