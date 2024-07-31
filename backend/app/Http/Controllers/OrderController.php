<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with(['user', 'restaurant'])->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'total_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'status' => 'required|string|in:pending,in_progress,delivered,canceled',
            'destination' => 'required|string'
        ]);

        $order = Order::create($validatedData);

        return response()->json($order, 201);
    }

    public function show($id)
    {
        return Order::with(['user', 'restaurant'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'restaurant_id' => 'sometimes|required|exists:restaurants,id',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'payment_method' => 'sometimes|required|string',
            'status' => 'sometimes|required|string|in:pending,in_progress,delivered,canceled',
            'destination' => 'sometimes|required|string'
        ]);

        $order->update($validatedData);

        return response()->json($order, 200);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(null, 204);
    }
}

