<?php
namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function index()
    {
        // return RestaurantCategory::with('restaurants')->get();
        return RestaurantCategory::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = RestaurantCategory::create($validatedData);

        return response()->json($category, 201);
    }

    public function show($id)
    {
        return RestaurantCategory::with('restaurants')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $category = RestaurantCategory::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $category->update($validatedData);

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = RestaurantCategory::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}

