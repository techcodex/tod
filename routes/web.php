<?php

use App\Http\Controllers\Api\PatientLoginController;
use App\Http\Controllers\Api\PatientRegisterController;
use App\Http\Controllers\Api\PatientsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/patient/register',[PatientRegisterController::class, 'register'])->name('patient.register');
// Route::post('/patient/login',[PatientLoginController::class,'login'])->name('patient.login');
// Route::post('/api/patient/calculate_bmi',[PatientsController::class,'calculateBMI'])->name('patient.calculateBMI');

// Route::group(['middleware' => ['auth:sanctum']], function() {
//     Route::post('/me',function() {
//         dd(auth()->user());
//     });
// });