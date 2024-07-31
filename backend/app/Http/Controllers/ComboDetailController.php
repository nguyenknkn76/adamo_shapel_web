<?php
namespace App\Http\Controllers;

use App\Models\ComboDetail;
use Illuminate\Http\Request;

class ComboDetailController extends Controller
{
    public function index()
    {
        return ComboDetail::with(['combo', 'dish'])->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'combo_id' => 'required|exists:combos,id',
            'dish_id' => 'required|exists:dishes,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $comboDetail = ComboDetail::create($validatedData);

        return response()->json($comboDetail, 201);
    }

    public function show($id)
    {
        return ComboDetail::with(['combo', 'dish'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $comboDetail = ComboDetail::findOrFail($id);

        $validatedData = $request->validate([
            'combo_id' => 'sometimes|required|exists:combos,id',
            'dish_id' => 'sometimes|required|exists:dishes,id',
            'quantity' => 'sometimes|required|integer|min:1'
        ]);

        $comboDetail->update($validatedData);

        return response()->json($comboDetail, 200);
    }

    public function destroy($id)
    {
        $comboDetail = ComboDetail::findOrFail($id);
        $comboDetail->delete();

        return response()->json(null, 204);
    }
}
