<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    use ApiResponser;
    /**
     * @param Illuminate\Http\Request
     * 
     * @return JSON
     */
    public function calculateBMI(Request $request)
    {
        $request->validate([
            'height' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);

        $bmi = ($request->get('weight') / ($request->height * $request->height)) * 10000;

        $data = [
            'bmi' => $bmi
        ];
        return $this->success($data,'success',200);
    }
}
