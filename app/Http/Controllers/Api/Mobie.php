<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\OnGoingOrders;
use App\Models\OrderItem;
use App\Models\orderReview;
use Illuminate\Support\Facades\Auth;

class Mobie extends Controller
{
    /**
        * @OA\Post(
        * path="/api/AddCustomer",
        * operationId="Register",
        * tags={"Register"},
        * summary="User Register",
        * description="User Register here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"name","email", "password"},
        *               @OA\Property(property="name", type="text"),
        *               @OA\Property(property="email", type="text"),
        *               @OA\Property(property="password", type="password")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $response = ['status' => true, 'message' => "User Created success!"];
        return response($response, 200);


    }
      /**
        * @OA\Get(
        * path="/api/Item/GetAll",
        * operationId="Items",
        * tags={"Items"},
        * summary="Get All Items",
        * description="All Items Data",
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
    public function items()
    {
        $items = Items::orderBy('id', 'desc')->get();
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
        * @OA\Get(
        * path="/api/Item/GetById/{id}",
        * operationId="Items",
        * tags={"Items"},
        * summary="Get All Items By Id",
        * description="All Items Data By Id",
         *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"id"},
        *               @OA\Property(property="id", type="text"),
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
    public function items_id($id)
    {
        $items = Items::find($id);

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

    public function items_type($itemtype)
    {
        $items = Items::where('itemtype', $itemtype)->get();
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
    public function zero(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = Items::find($update_id);
            $items->status = 0;
            $items->save();
            $response = ['status' => true, 'message' => "Status Update Successfully!"];
            return response($response, 200);
        }
    }
    public function one(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = Items::find($update_id);
            $items->status = 1;
            $items->save();
            $response = ['status' => true, 'message' => "Status Update Successfully!"];
            return response($response, 200);
        }
    }
    public function Availability(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = Items::find($update_id);
            $items->status = true;
            $items->save();
            $response = ['status' => true, 'message' => "Status Update Successfully!"];
            return response($response, 200);
        }
    }
    public function order_one(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = ongoingOrders::find($update_id);
            $items->status = 1;
            $items->save();
            $response = ['status' => true, 'message' => "Status Update Successfully!"];
            return response($response, 200);
        }
    }
    public function order_zero(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = ongoingOrders::find($update_id);
            $items->status = 0;
            $items->save();
            $response = ['status' => true, 'message' => "Status Update Successfully!"];
            return response($response, 200);
        }
    }
    public function itemstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
            'nameAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'itemtype' => 'required',
            'itemtypeAr' => 'required',
            'unitprice' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
            $items = new Items();
            $imageName = time() . '.' . $request->image->extension();
            if ($request->hasfile('image')) {
                $items->image = $imageName;
                $request->image->move(public_path('images'), $imageName);
            }
            $items->name = $request->name;
            $items->namsAr = $request->nameAr;
            $items->description = $request->description;
            $items->descriptionAr = $request->descriptionAr;
            $items->itemtype = $request->itemtype;
            $items->itemtypeAr = $request->itemtypeAr;
            $items->unitprice = $request->unitprice;
            $items->save();
            $response = ['status' => true, 'message' => "Item Saved Successfully!"];
            return response($response, 200);
    }

    public function UpdateOrderStatus(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $items = OrderItem::find($update_id);
            $items->Status = $request->status;
            $items->save();
            $response = ['status' => true, 'message' => "Status Update Successfully!"];
            return response($response, 200);
        }
    }
    public function review(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driverId' => 'required',
            'customerId' => 'required',
            'orderId' => 'required',
            'reviewMessage' => 'required',
            'reviewRating' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
            $review = new orderReview();
            $review->driverId = $request->driverId;
            $review->customerId = $request->customerId;
            $review->orderId = $request->orderId;
            $review->reveiwMessage = $request->reviewMessage;
            $review->reveiwRating = $request->reviewRating;
            $review->save();
            $response = ['status' => true, 'message' => "Reviews Saved Successfully!"];
            return response($response, 200);
    }
    public function ongoingOrders(Request $request)
    {
     
            $order = new ongoingOrders();
            $order->userId = $request->userId;
            $order->statusAr = $request->statusAr;
            $order->orderType = $request->orderType;
            $order->orderTypeAr = $request->orderTypeAr;
            $order->totalAmount = $request->totalAmount;
            $order->discount = $request->discount;
            $order->serviceCharges = $request->serviceCharges;
            $order->deliveryCharges = $request->deliveryCharges;
            $order->tax = $request->tax;
            $order->netAmount = $request->netAmount;
            $order->assignedTime = $request->assignedTime;
            $order->dispatchedTime = $request->dispatchedTime;
            $order->deliveryTime = $request->deliveryTime;
            $order->paymentType = $request->paymentType;
            $order->paymentTypeAr = $request->paymentTypeAr;
            $order->orderAddress = $request->orderAddress;
            $order->orderAddressAr = $request->orderAddressAr;
            $order->orderLatitude = $request->orderLatitude;
            $order->orderLongitude = $request->orderLongitude;
            $order->building = $request->building;
            $order->houseNumber = $request->houseNumber;
            $order->landMark = $request->landMark;
            
            $order->save();
            $response = ['status' => true, 'message' => "Order Saved Successfully!"];
            return response($response, 200);
    }
    public function attachments(Request $request)
    {
        $attachments = new attachments();
        $imageName = time().rand(1,100) . '.' . $request->attachments->extension();
        if ($request->hasfile('url1')) {
            $attachments->attachments = $imageName;
            $request->attachments->move(public_path('images'), $imageName);
        }
        $attachments->lan= $request->lan;
        $attachments->save();
        $response = ['status' => true, 'message' => "File has been uploaded successfully!"];
            return response($response, 200);
    }

    public function OnGoing(Request $request)
    {
        $attachments = new OnGoingOrders();

        $attachments->lan= $request->lan;
        $attachments->save();
        $response = ['status' => true, 'message' => "File has been uploaded successfully!"];
            return response($response, 200);
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = Items::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('user.search_thumbnails', compact('posts'));
    }
}
