<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Nurse\DeletePatientController;
use App\Http\Controllers\Nurse\ExportPatientsController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Nurse\CreateNewBloodPressureEntry;
use App\Http\Livewire\Nurse\CreatePatient;
use App\Http\Livewire\Nurse\ShowPatientBloodPressureReadings;
use App\Http\Livewire\Nurse\ShowPatients;
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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->prefix('patients')->group(function () {
    Route::get('/', ShowPatients::class)->name('patients.index');
    Route::get('export', ExportPatientsController::class)->name('patients.export');
    Route::get('create', CreatePatient::class)->name('patients.create');
    Route::get('{patient}/readings', ShowPatientBloodPressureReadings::class)->name('patients.readings');
    Route::get('{patient}/readings/create', CreateNewBloodPressureEntry::class)->name('patients.readings.create');
    Route::get('{id}/delete', DeletePatientController::class)->name('patient.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
