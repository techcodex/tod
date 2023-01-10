<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientBmiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Validate height
     *
     * @return void
     */
    public function test_patient_height_is_not_null()
    {
        $form_data = [
            'height' => '',
            'weight' => 72
        ];
        $this->json('POST', route('patient.calculateBMI'), $form_data)
                ->assertStatus(200);
    }

    /**
     * Validate height
     *
     * @return void
     */
    public function test_patient_weight_is_not_null()
    {
        $form_data = [
            'height' => 178,
            'weight' => ''
        ];
        $this->json('POST', route('patient.calculateBMI'), $form_data)
                ->assertStatus(200);
    }

    /**
     * Validate height
     *
     * @return void
     */
    public function test_patient_calculate_bmi()
    {
        $form_data = [
            'height' => 178,
            'weight' => 72
        ];
        $this->json('POST', route('patient.calculateBMI'), $form_data)
                ->assertStatus(200);
    }
}
