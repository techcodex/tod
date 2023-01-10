<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRegisterRequest;
use App\Http\Resources\PatientRegisterResource;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponser;

class PatientRegisterController extends Controller
{
    use ApiResponser;
    /**
     * @param Illuminate\Http\Request
     * 
     * Register Patient
     * 
     * @return Illuminate\Http\Response
     */
    public function register(PatientRegisterRequest $request)
    {
        $patient = new Patient();
        
        $patient->name = $request->get('name');
        $patient->email = $request->get('email');
        $patient->password = Hash::make('password');
        $patient->save();

        if ($patient) {
            return $this->success(new PatientRegisterResource($patient),'Patient Register Successfully',200);
        } else {
            return $this->error([],'Opps Something went wrong try again', 400);
        }
    }
}
