<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        return Voucher::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255|unique:vouchers',
            'discount' => 'required|numeric|min:0|max:100',
            'expiry_date' => 'required|date',
            'conditions' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]);

        $voucher = Voucher::create($validatedData);

        return response()->json($voucher, 201);
    }

    public function show($id)
    {
        return Voucher::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $validatedData = $request->validate([
            'code' => 'sometimes|required|string|max:255|unique:vouchers,code,' . $voucher->id,
            'discount' => 'sometimes|required|numeric|min:0|max:100',
            'expiry_date' => 'sometimes|required|date',
            'conditions' => 'nullable|string',
            'quantity' => 'sometimes|required|integer|min:0',
        ]);

        $voucher->update($validatedData);

        return response()->json($voucher, 200);
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return response()->json(null, 204);
    }
}
