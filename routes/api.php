<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineReleaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){

     Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

     Route::get('/get-patients', [PatientController::class, 'getPatients']); // Get all patients
    Route::post('/add-patient', [PatientController::class, 'addPatient']); // Create a new patient
    Route::put('/edit-patient/{id}', [PatientController::class, 'editPatient']); // Update a patient's details
    Route::delete('/delete-patient/{id}', [PatientController::class, 'deletePatient']); // Delete a patient

    Route::get('/get-appointments', [AppointmentController::class, 'getAppointments']);
Route::post('/add-appointment', [AppointmentController::class, 'addAppointment']);
Route::put('/edit-appointment/{id}', [AppointmentController::class, 'editAppointment']);
Route::delete('/delete-appointment/{id}', [AppointmentController::class, 'deleteAppointment']);

Route::get('/get-medicines', [MedicineController::class, 'getMedicines']);
Route::post('/add-medicine', [MedicineController::class, 'addMedicine']);
Route::put('/edit-medicine/{id}', [MedicineController::class, 'editMedicine']);
Route::delete('/delete-medicine/{id}', [MedicineController::class, 'deleteMedicine']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get-medicine-releases', [MedicineReleaseController::class, 'getReleases']);
    Route::post('/add-medicine-release', [MedicineReleaseController::class, 'addRelease']);
    Route::put('/edit-medicine-release/{id}', [MedicineReleaseController::class, 'editRelease']);
    Route::delete('/delete-medicine-release/{id}', [MedicineReleaseController::class, 'deleteRelease']);
});


    


  Route::post('/logout', [AuthenticationController::class, 'logout']);


   


});