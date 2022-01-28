<?php

namespace App\Http\Controllers;

use App\Models\orderReview;
use Illuminate\Http\Request;

class OrderReviewController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orderReview  $orderReview
     * @return \Illuminate\Http\Response
     */
    public function show(orderReview $orderReview)
    {
        //
    }
    public function review($DriverId)
    {
        $Review = orderReview::where('driverId' , $DriverId)->get();

        if(!empty($Review))
        {
            $response = ['status' => true, 'Review' => $Review ?? 'Driver ID Not Found'];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'Review' => ''];
            return response($response, 400);
        }

    }
    public function reviewOrder($OrderId)
    {
        $Review = orderReview::where('orderId' , $OrderId)->get();

        if(!empty($Review))
        {
            $response = ['status' => true, 'Review' => $Review ?? 'Driver ID Not Found'];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'Review' => ''];
            return response($response, 400);
        }

    }
    public function reviewCustomer($CustomerId)
    {
        $Review = orderReview::where('customerId' , $CustomerId)->get();

        if(!empty($Review))
        {
            $response = ['status' => true, 'Review' => $Review ?? 'Driver ID Not Found'];
            return response($response, 200);
        }
        else{
            $response = ['status' => false, 'Review' => ''];
            return response($response, 400);
        }

    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderReview  $orderReview
     * @return \Illuminate\Http\Response
     */
    public function edit(orderReview $orderReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderReview  $orderReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderReview $orderReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderReview  $orderReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderReview $orderReview)
    {
        //
    }
}
