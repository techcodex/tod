<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_patient_login()
    {
        $form_data = [
            'email' => 'sohaib@yahoo.com',
            'password' => 'password'
        ];
        $this->json('POST', route('patient.login'), $form_data)
                ->assertStatus(200);
    }
}
