<?php

namespace App\Http\Controllers;

use App\Models\MedicineRelease;
use Illuminate\Http\Request;

class MedicineReleaseController extends Controller
{
    public function getReleases()
    {
        $releases = MedicineRelease::with(['appointment.patient', 'medicine'])->get();
        return response()->json(['medicinereleases' => $releases]);
    }

    public function addRelease(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medicine_id' => 'required|exists:medicines,id',
            'quantity_released' => 'required|integer|min:1',
        ]);

        $release = MedicineRelease::create($request->all());

        return response()->json(['message' => 'Medicine release successfully created!', 'release' => $release]);
    }

    public function editRelease(Request $request, $id)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medicine_id' => 'required|exists:medicines,id',
            'quantity_released' => 'required|integer|min:1',
        ]);

        $release = MedicineRelease::find($id);

        if (!$release) {
            return response()->json(['message' => 'Medicine release not found!'], 404);
        }

        $release->update($request->all());

        return response()->json(['message' => 'Medicine release successfully updated!', 'release' => $release]);
    }

    public function deleteRelease($id)
    {
        $release = MedicineRelease::find($id);

        if (!$release) {
            return response()->json(['message' => 'Medicine release not found!'], 404);
        }

        $release->delete();

        return response()->json(['message' => 'Medicine release successfully deleted!']);
    }
}
