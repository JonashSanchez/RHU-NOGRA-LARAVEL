<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Get all medicines
    public function getMedicines()
    {
        $medicines = Medicine::all();
        return response()->json(['medicines' => $medicines]);
    }

    // Add a new medicine
    public function addMedicine(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'quantity' => ['required', 'integer', 'min:0'],
            'expiry_date' => ['required', 'date'],
        ]);

        $medicine = Medicine::create($request->all());

        return response()->json(['message' => 'Medicine successfully added!', 'medicine' => $medicine]);
    }

    // Edit an existing medicine
    public function editMedicine(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'quantity' => ['required', 'integer', 'min:0'],
            'expiry_date' => ['required', 'date'],
        ]);

        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found!'], 404);
        }

        $medicine->update($request->all());

        return response()->json(['message' => 'Medicine successfully updated!', 'medicine' => $medicine]);
    }

    // Delete a medicine
    public function deleteMedicine($id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found!'], 404);
        }

        $medicine->delete();

        return response()->json(['message' => 'Medicine successfully deleted!']);
    }
}
