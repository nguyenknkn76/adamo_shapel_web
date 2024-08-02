<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;

class RestaurantController extends Controller
{
    public function getByCity($city_id)
    {
        $restaurants = Restaurant::where('city_id', $city_id)->with(['city', 'restaurant_category'])->get();
        return response()->json($restaurants);
    }

    public function getByCategory($category_id)
    {
        $restaurants = Restaurant::where('restaurant_category_id', $category_id)->with(['city', 'restaurant_category'])->get();
        return response()->json($restaurants);
    }

    public function getByCityAndCategory(Request $request)
    {   
        $city_id = $request->route('city_id');
        // $validatedData = $request->validate([
        //     'city_id' => 'required|exists:cities,id',
        //     'restaurant_category_id' => 'required|exists:restaurant_categories,id',
        // ]);

        // $restaurants = Restaurant::where('city_id', $validatedData['city_id'])
        //     ->where('restaurant_category_id', $validatedData['restaurant_category_id'])
        //     ->with(['city', 'restaurant_category'])
        //     ->get();

        return response()->json($city_id);
    }

    public function index(Request $request)
    {
        $query = Restaurant::query();

        if ($request->has('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }

        if ($request->has('restaurant_category_id')) {
            $query->where('restaurant_category_id', $request->input('restaurant_category_id'));
        }

        $restaurants = $query->with(['city', 'restaurant_category'])->get();

        return response()->json($restaurants);
        // return Restaurant::all();
        // return Restaurant::with(['city','restaurant_category'])->get();
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
            'city_id' => 'required|exists:cities,id',
            'restaurant_category_id' => 'sometimes|required|exists:restaurant_categories,id'
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
            'city_id' => 'sometimes|exists:cities,id',
            'restaurant_category_id' => 'required|exists:restaurant_categories,id',
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
