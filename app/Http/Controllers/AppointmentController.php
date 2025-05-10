<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getAppointments()
    {
        $appointments = Appointment::with('patient')->get();

        return response()->json(['appointments' => $appointments]);
    }

    public function addAppointment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $appointment = Appointment::create([
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'reason' => $request->reason,
        ]);

        return response()->json(['message' => 'Appointment successfully created!', 'appointment' => $appointment]);
    }

    public function editAppointment(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found!'], 404);
        }

        $appointment->update([
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'reason' => $request->reason,
        ]);

        return response()->json(['message' => 'Appointment successfully updated!', 'appointment' => $appointment]);
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found!'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'Appointment successfully deleted!']);
    }
}
