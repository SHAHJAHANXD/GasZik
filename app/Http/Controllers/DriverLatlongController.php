<?php

namespace App\Http\Controllers;

use App\Models\DriverLatlong;
use App\Models\DriverOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverLatlongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function a($lat, $lng)
    {
        $items =   DB::table("driver_latlongs")
            ->select("driver_latlongs.id", DB::raw("6371 * acos(cos(radians(" . $this->lat . "))
     * cos(radians(driver_latlongs.latitude)) 
     * cos(radians(driver_latlongs.longitude) - radians(" . $this->lng . ")) 
     + sin(radians(" . $this->lat . ")) 
     * sin(radians(driver_latlongs.latitude))) AS distance"))
            ->having('distance', '<', $this->rad)
            ->first();

        if (!empty($items)) {
            $response = ['status' => true, 'items' => $items];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'items' => ''];
            return response($response, 400);
        }
    }
    public function userlatlong($Latitude, $Longitude, $radius = 4071000)
    {
        /*
         * using query builder approach, useful when you want to execute direct query
         * replace 6371000 with 6371 for kilometer and 3956 for miles
         */

        $latlong = DB::table('users')
            ->selectRaw("id, DriverId, Latitude, Longitude ,
                         ( 6371000 * acos( cos( radians(?) ) *
                           cos( radians( Latitude ) )
                           * cos( radians( Latitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( Latitude ) ) )
                         ) AS distance", [$Latitude, $Longitude, $Latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->get();
        if (!empty($latlong)) {
            $response = ['status' => true, 'latlong' => $latlong];
            return response($response, 200);
        }
    }
    public function latlong($Latitude, $Longitude, $radius = 4071000)
    {
        /*
         * using query builder approach, useful when you want to execute direct query
         * replace 6371000 with 6371 for kilometer and 3956 for miles
         */
        $latlong = DB::table('driver_latlongs')
            ->selectRaw("id, DriverId, Latitude, Longitude ,
                         ( 6371000 * acos( cos( radians(?) ) *
                           cos( radians( Latitude ) )
                           * cos( radians( Latitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( Latitude ) ) )
                         ) AS distance", [$Latitude, $Longitude, $Latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->get();
            if (!empty($latlong)) {
                $response = ['status' => true, 'latlong' => $latlong];
                return response($response, 200);
            }
            // return redirect('/assignOrder');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = new DriverOrder();
        $order->OrderId = $request->OrderId;
        $order->DriverId = $request->DriverId;
        $order->Latlong = $request->Latlong;
        $order->Latitude =  $request->Latlong;
        $order->Longitude = $request->Latlong;
        $order->save();
    }
    public function latlongall()
    {
        $DriverOrder = DriverLatlong::get();

        if(!empty($DriverOrder))
        {
            $response = ['status' => true, 'items' => $DriverOrder];
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
        $driver = new DriverLatlong();
        $driver->DriverID = $request->DriverId;
        $driver->Latlong = $request->Latlong;
        $driver->Latitude = $request->Latitude;
        $driver->Longitude = $request->Longitude;
        $driver->save();

        $response = ['status' => true, 'message' => "Saved Success!"];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriverLatlong  $driverLatlong
     * @return \Illuminate\Http\Response
     */
    public function show(DriverLatlong $driverLatlong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriverLatlong  $driverLatlong
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverLatlong $driverLatlong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DriverLatlong  $driverLatlong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverLatlong $driverLatlong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriverLatlong  $driverLatlong
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverLatlong $driverLatlong)
    {
        //
    }
}
