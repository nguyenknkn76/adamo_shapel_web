<?php
namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        return OrderDetail::with(['order', 'dish', 'combo', 'voucher'])->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'dish_id' => 'nullable|exists:dishes,id',
            'combo_id' => 'nullable|exists:combos,id',
            'voucher_id' => 'nullable|exists:vouchers,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'note' => 'nullable|string'
        ]);

        $orderDetail = OrderDetail::create($validatedData);

        return response()->json($orderDetail, 201);
    }

    public function show($id)
    {
        return OrderDetail::with(['order', 'dish', 'combo', 'voucher'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $orderDetail = OrderDetail::findOrFail($id);

        $validatedData = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'dish_id' => 'nullable|exists:dishes,id',
            'combo_id' => 'nullable|exists:combos,id',
            'voucher_id' => 'nullable|exists:vouchers,id',
            'quantity' => 'sometimes|required|integer',
            'price' => 'sometimes|required|numeric',
            'note' => 'nullable|string'
        ]);

        $orderDetail->update($validatedData);

        return response()->json($orderDetail, 200);
    }

    public function destroy($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->delete();

        return response()->json(null, 204);
    }
}
