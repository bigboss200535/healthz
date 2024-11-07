<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\PatientVisitsController;
use App\Http\Controllers\CodeGenerationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PDFReportController;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Route;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function (){
//     return view('login');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('patients', PatientController::class)
        ->missing(function (Request $request){
          return Redirect::route('patient.create');
    });

    
    // Route::get('patients/add-visit/{patient_id}', [PatientController::class, 'attendance'])->name('patient.show');
   
    Route::resource('service', ServiceRequestController::class);
    Route::resource('users', ProfileController::class);
    Route::resource('sponsors', SponsorController::class); 
    Route::resource('services', ServiceRequestController::class);
   
    Route::get('patient/create/', [PatientController::class, 'create'])->name('patient.create');
    Route::get('patient/search/', [ PatientController::class, 'index'])->name('patient.index');
    Route::get('patient/visits/{patient_id}', [PatientVisitsController::class, 'index'])->name('attendance.index');
    Route::get('patient/modify/{patient_id}', [PatientController::class, 'edit'])->name('patient.create');
    Route::get('patient/attendance/{patient_id}', [PatientVisitsController::class, 'show'])->name('attendance.show');
    Route::get('patients/details/{patient_id}', [PatientController::class, 'show'])->name('patient.show');
    Route::get('/services/{clinic}/specialties', [ServiceRequestController::class, 'getspecialties']);
    Route::get('/services/{service_id}/service_tarif', [ServiceRequestController::class, 'gettarrifs']);
    Route::post('/services/patient_service', [ServiceRequestController::class, 'store']);
    Route::get('/services/patient_service_data/{patient_id}', [ServiceRequestController::class, 'retrieve']);
    Route::get('pdf', [PDFReportController::class, 'index']);
    // Route::get('code_generate', [CodeGenerationController::class, 'index']);
    Route::post('code_generate', [CodeGenerationController::class, 'index']);
});

require __DIR__.'/auth.php';
