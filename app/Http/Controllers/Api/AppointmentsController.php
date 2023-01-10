<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    use ApiResponser;

    public function makeAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'doctor_name' => 'required'
        ]);
        
        // Check patient already book an appointment with the doctor on same date
        $appointment = Appointment::where([
            ['doctor_name',$request->doctor_name],
            ['patient_name', $request->patient_name],
            ['appointment_date',$request->date],
            ['status',1]
        ])->get()->count();

        if ($appointment)
            return $this->error([],'You already book appoinment with this doctor on this date',400);

        // Get appointment for the provided date
        $appointment_count = Appointment::where([
            ['appointment_date','=',$request->date],
            ['doctor_name','=',$request->doctor_name]
        ])->get()->count();

        if ($appointment_count > 5)
            return $this->error([],'Appointment Not Available', 400);
        
        $appointment = Appointment::create([
            'patient_name' => $request->patient_name,
            'doctor_name' => $request->doctor_name,
            'appointment_date' => $request->date,
            'status' => 1
        ]);

        if (!$appointment) {
            return $this->error([],'Opps Something went wrong please try again later',400);
        }

        return $this->success([],'Appointment taken Successfully',200);

    }
}
