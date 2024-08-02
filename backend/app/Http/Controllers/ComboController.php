<?php
namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    public function getByRestaurantId($restaurant_id)
    {
        $combos = Combo::where('restaurant_id',$restaurant_id)->get();
        return response()->json($combos);
    }
    
    public function index()
    {
        return Combo::with('restaurant')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|boolean',
            'image_url' => 'nullable|string',
        ]);

        $combo = Combo::create($validatedData);

        return response()->json($combo, 201);
    }

    public function show($id)
    {
        return Combo::with('restaurant')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $combo = Combo::findOrFail($id);

        $validatedData = $request->validate([
            'restaurant_id' => 'sometimes|required|exists:restaurants,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|boolean',
            'image_url' => 'nullable|string',
        ]);

        $combo->update($validatedData);

        return response()->json($combo, 200);
    }

    public function destroy($id)
    {
        $combo = Combo::findOrFail($id);
        $combo->delete();

        return response()->json(null, 204);
    }
}
