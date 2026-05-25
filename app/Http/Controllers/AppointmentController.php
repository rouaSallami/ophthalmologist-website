<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('front.appointment');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:50',
            'appointment_date' => 'nullable|date',
            'service' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Appointment::create($validated);

        return back()->with('appointment_success', 'Appointment request sent successfully.');
    }
}