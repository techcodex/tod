<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test Patient name is not null
     *
     * @return void
     */
    public function test_patient_name_is_not_null()
    {
        $form_data = [
            'name' => '',
            'email' => 'sohaib13@yahoo.com',
            'password' => 'password',
        ];

        $this->withExceptionHandling();

        $this->json('POST', route('patient.register'), $form_data)
                ->assertStatus(200);
    }
    /**
     * 
     */
    public function test_patient_email_is_not_null()
    {
        $form_data = [
            'name' => 'sohaib',
            'email' => '',
            'password' => 'password',
        ];

        $this->withExceptionHandling();

        $this->json('POST', route('patient.register'), $form_data)
                ->assertStatus(200);
    }
    /**
     * 
     */
    public function test_patient_password_is_not_null()
    {
        $form_data = [
            'name' => 'sohaib',
            'email' => 'sohaib13@yahoo.com',
            'password' => '',
        ];

        $this->withExceptionHandling();

        $this->json('POST', route('patient.register'), $form_data)
                ->assertStatus(200);
    }

    /**
     * 
     */
    public function test_register_patient()
    {
        $form_data = [
            'name' => 'sohaib',
            'email' => 'sohaib13@yahoo.com',
            'password' => 'password',
        ];

        $this->withExceptionHandling();

        $this->json('POST', route('patient.register'), $form_data)
                ->assertStatus(200);
    }
}
