<?php
namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        // return City::with('restaurants')->get();
        return City::all();
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $city = City::create($validatedData);

        return response()->json($city, 201);
    }

    public function show($id)
    {
        return City::with('restaurants')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $city->update($validatedData);

        return response()->json($city, 200);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(null, 204);
    }
}
