<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Review::with(['user','dish', 'combo'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'dish_id' => 'nullable|exists:dishes,id',
            'combo_id' => 'nullable|exists:combos,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review = Review::create($validatedData);

        return response()->json($review,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Review::with(['user','dish','combo'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'dishes_id' => 'nullable|exists:dishes,id',
            'combos_id' => 'nullable|exists:combos,id',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update($validatedData);

        return response()->json($review, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(null, 204);
    }
}
