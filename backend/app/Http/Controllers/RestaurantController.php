<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
            'open_time' => 'required',
            'close_time' => 'required',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $restaurant = Restaurant::create($validatedData);

        return response()->json($restaurant, 201);
    }

    public function show($id)
    {
        return Restaurant::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'phone_number' => 'sometimes|required|string|max:15',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
            'open_time' => 'sometimes|required',
            'close_time' => 'sometimes|required',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $restaurant->update($validatedData);

        return response()->json($restaurant, 200);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return response()->json(null, 204);
    }
}
