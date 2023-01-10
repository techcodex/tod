<?php

use App\Http\Controllers\Api\AppointmentsController;
use App\Http\Controllers\Api\PatientLoginController;
use App\Http\Controllers\Api\PatientRegisterController;
use App\Http\Controllers\Api\PatientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/patient/register',[PatientRegisterController::class, 'register'])->name('patient.register');
Route::post('/patient/login',[PatientLoginController::class,'login'])->name('patient.login');
Route::post('/patient/calculate_bmi',[PatientsController::class,'calculateBMI'])->name('patient.calculateBMI');
Route::post('/appointment',[AppointmentsController::class, 'makeAppointment'])->name('appointment.store');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/me',function() {
        dd(auth()->user());
    });
});