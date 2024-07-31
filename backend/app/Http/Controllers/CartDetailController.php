<?php
namespace App\Http\Controllers;

use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function index()
    {
        // return CartDetail::with(['cart', 'dish', 'combo'])->get();
        return CartDetail::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'dish_id' => 'nullable|exists:dishes,id',
            'combo_id' => 'nullable|exists:combos,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        $cartDetail = CartDetail::create($validatedData);

        return response()->json($cartDetail, 201);
    }

    public function show($id)
    {
        return CartDetail::with(['cart', 'dish', 'combo'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cartDetail = CartDetail::findOrFail($id);

        $validatedData = $request->validate([
            'cart_id' => 'sometimes|required|exists:carts,id',
            'dish_id' => 'nullable|exists:dishes,id',
            'combo_id' => 'nullable|exists:combos,id',
            'quantity' => 'sometimes|required|integer|min:1',
            'price' => 'sometimes|required|numeric|min:0'
        ]);

        $cartDetail->update($validatedData);

        return response()->json($cartDetail, 200);
    }

    public function destroy($id)
    {
        $cartDetail = CartDetail::findOrFail($id);
        $cartDetail->delete();

        return response()->json(null, 204);
    }
}

