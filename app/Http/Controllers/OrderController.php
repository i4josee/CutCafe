<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 public function index()
    {
        $orders = Order::orderBy("created_at","desc")->paginate(10);
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request ->validate([
            "order_name"=> "required",
            "customer_name"=> "required",
            "total_amount"=> "required",
        ]);

        $order = Order::create($request->all());
        return response()->json($order);
    }

    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' =>'Order Not Found'], status:404);
        }
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message'=> 'Order Not Found'], status:404);
        }

        $request ->validate([
            'order_name'=> 'required',
            'customer_name'=> 'required',
            'total_amount'=> 'required',
        ]);

        $order -> update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message'=> 'Order Not Found'], status:404);
        }

        $order -> delete();
        return response()->json($order);
    }
}
