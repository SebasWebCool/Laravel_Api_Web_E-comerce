<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sock;

class ApiiSockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $socks = Sock::all();
    return response()->json($socks);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $product = new Sock();

    $product->name = $request->input('name');
    $product->price = $request->input('price');

    $product->save();
    return response()->json($product, 201);
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $product = Sock::find($id);
    if (!$product) {
        return response()->json(['message' => 'Sock not found'], 404);
    }
    return response()->json($product);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
{
    $sock->update($request->all());

    $product = Sock::find($id);
    if (!$product) {
        return response()->json(['message' => 'Sock not found'], 404);
    }

    $product->name = $name;
    $product->price = $price;

    $product->save();
    return response()->json(['message' => 'Sock updated successfully']);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $product = Sock::find($id);
    if (!$product) {
        return response()->json(['message' => 'Sock not found'], 404);
    }

    $product->save();
    return response()->json($product);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = Sock::find($id);
    if (!$product) {
        return response()->json(['message' => 'Sock not found'], 404);
    }

    $product->delete();
    return response()->json(['message' => 'Sock deleted']);
}

    public function addToCart(Request $request)
{

    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');
    
    
    return response()->json(['message' => 'Sock added to cart']);
}

public function removeFromCart(Request $request)
{
    $productId = $request->input('product_id');
    
    
    
    return response()->json(['message' => 'Sock removed from cart']);
}

public function checkout()
{
    
    
    return response()->json(['message' => 'Checkout completed']);
}

public function getOrders()
{
    $orders = Order::all();
    return response()->json($orders);
}

public function getOrderDetails($id)
{
    $order = Order::find($id);
    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }
    return response()->json($order);
}

}
