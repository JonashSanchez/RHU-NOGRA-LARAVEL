<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Get all patients.
     */
    public function getPatients()
    {
        $patients = Patient::all();
        return response()->json(['patients' => $patients]);
    }

    /**
     * Add a new patient.
     */
    public function addPatient(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:10'],
            'contact' => ['nullable', 'string', 'max:15'],
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'contact' => $request->contact,
        ]);

        return response()->json(['message' => 'Patient created successfully', 'patient' => $patient]);
    }

    /**
     * Edit a specific patient.
     */
    public function editPatient(Request $request, $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:10'],
            'contact' => ['nullable', 'string', 'max:15'],
        ]);

        $patient->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'contact' => $request->contact,
        ]);

        return response()->json(['message' => 'Patient updated successfully', 'patient' => $patient]);
    }

    /**
     * Delete a specific patient.
     */
    public function deletePatient($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}
