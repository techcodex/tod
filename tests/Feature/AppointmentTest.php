<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_appointment_date_is_not_null()
    {
        $form_data = [
            'doctor_name' => 'sohaib',
            'date' => '',
            'patient_name' => 'amjad'
        ];
        $this->json('POST', route('appointment.store'), $form_data)
                ->assertStatus(200);   
    }

    public function test_appointment_doctor_name_is_not_null()
    {
        $form_data = [
            'doctor_name' => '',
            'date' => '2023-01-12',
            'patient_name' => 'sohaib'
        ];
        $this->json('POST', route('appointment.store'), $form_data)
                ->assertStatus(200);   
    }

    public function test_appointment_patient_name_is_not_null()
    {
        $form_data = [
            'doctor_name' => 'sohaib',
            'date' => '2023-01-12',
            'patient_name' => ''
        ];
        $this->json('POST', route('appointment.store'), $form_data)
                ->assertStatus(200);   
    }

    public function test_patient_same_appointment_entry()
    {
        $form_data = [
            'doctor_name' => 'sohaib',
            'date' => '2023-01-01',
            'patient_name' => 'jack'
        ];
        Appointment::create([
            'patient_name' => $form_data['patient_name'],
            'appointment_date' => $form_data['date'],
            'doctor_name' => $form_data['doctor_name'],
            'status' => 1
        ]);
        $this->json('POST', route('appointment.store'), $form_data)
                ->assertStatus(200);   
    }

    public function test_doctor_appointment_count()
    {
        $form_data = [
            'doctor_name' => 'sohaib',
            'date' => '2023-01-01',
            'patient_name' => 'jack'
        ];
        for($i=1; $i<6; $i++) {
            Appointment::create([
                'patient_name' => 'sohaib'.$i,
                'appointment_date' => $form_data['date'],
                'doctor_name' => $form_data['doctor_name'],
                'status' => 1
            ]);
        }
        $this->json('POST', route('appointment.store'), $form_data)
                ->assertStatus(200);   
    }

    public function test_make_appointment()
    {
        $form_data = [
            'doctor_name' => 'sohaib',
            'date' => '2023-01-01',
            'patient_name' => 'jack'
        ];
        $this->json('POST', route('appointment.store'), $form_data)
                ->assertStatus(200);   
    }
    
}
