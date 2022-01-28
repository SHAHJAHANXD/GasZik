<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_items');
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

            $items = new Items();
            $imageName = time() . '.' . $request->image->extension();
            if ($request->hasfile('image')) {
                $items->image = $imageName;
                $request->image->move(public_path('images'), $imageName);
            }

            $items->name = $request->name;
            $items->nameAr = $request->nameAr;
            $items->description = $request->description;
            $items->descriptionAr = $request->descriptionAr;
            $items->itemtype = $request->itemtype;
            $items->itemtypeAr = $request->itemtypeAr;
            $items->unitprice = $request->unitprice;
            $items->save();
            return redirect()->back()->with('Success', 'Items Added Successfully!');
    }
    public function zero(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = Items::find($update_id);
            $items->status = 0;
            $items->save();
            return redirect()->back()->with('success', 'Leave Updated Successfully!');
        }
    }
    public function one(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = Items::find($update_id);
            $items->status = 1;
            $items->save();
            return redirect()->back()->with('success', 'Leave Updated Successfully!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Items::find($id);
        $delete->delete();
        $response = ['status' => false, 'message' => "Item Delete Successfully!"];
        return response($response, 200);
    }
}
