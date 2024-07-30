<?php
namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        return Dish::with(['restaurant', 'category'])->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|string',
            'status' => 'required|boolean'
        ]);

        $dish = Dish::create($validatedData);

        return response()->json($dish, 201);
    }

    public function show($id)
    {
        return Dish::with(['restaurant', 'category'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        $validatedData = $request->validate([
            'restaurant_id' => 'sometimes|required|exists:restaurants,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'image_url' => 'nullable|string',
            'status' => 'sometimes|required|boolean'
        ]);

        $dish->update($validatedData);

        return response()->json($dish, 200);
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return response()->json(null, 204);
    }
}
