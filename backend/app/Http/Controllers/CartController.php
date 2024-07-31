<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::with('user')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $cart = Cart::create($validatedData);

        return response()->json($cart, 201);
    }

    public function show($id)
    {
        return Cart::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id'
        ]);

        $cart->update($validatedData);

        return response()->json($cart, 200);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return response()->json(null, 204);
    }
}
