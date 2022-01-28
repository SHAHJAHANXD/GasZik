<?php

namespace App\Http\Controllers;

use App\Models\OnGoingOrders;
use Illuminate\Http\Request;

class OnGoingOrdersController extends Controller
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
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = OnGoingOrders::find($update_id);
            $items->status = $request->status;
            $items->save();
         return redirect()->back()->with('message','Status Updated Successfully!');
        }
    }
    public function allongoing()
    {
        $items = OnGoingOrders::get();
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
    public function allongoingid($id)
    {
        $items = OnGoingOrders::find('id',$id)->get();
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
    public function ongoing()
    {
        $items = OnGoingOrders::where('status', 1)->get();
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
     * Display the specified resource.
     *
     * @param  \App\Models\OnGoingOrders  $onGoingOrders
     * @return \Illuminate\Http\Response
     */
    public function show(OnGoingOrders $onGoingOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnGoingOrders  $onGoingOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(OnGoingOrders $onGoingOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnGoingOrders  $onGoingOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnGoingOrders $onGoingOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnGoingOrders  $onGoingOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnGoingOrders $onGoingOrders)
    {
        //
    }
}
