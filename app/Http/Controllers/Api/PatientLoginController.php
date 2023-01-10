<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientLoginRequest;
use App\Http\Resources\PatientLoginResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientLoginController extends Controller
{
    use ApiResponser;

    public function login(PatientLoginRequest $request)
    {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->error([],'Invalid Email or password',422);
        }

        return $this->success(new PatientLoginResource(auth()->user(),'Login Successfully',200));
    }
}
