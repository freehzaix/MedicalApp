<?php

use App\Http\Controllers\MedecinsController;
use App\Http\Controllers\PatientsController;
use App\Http\Livewire\MedecinsIndex;
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

// On va rediriger vers la route de connexion si l'utilisateur n'est pas authentifié
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Routes d'authentification
Route::get('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/auth/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Routes d'inscription
Route::get('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');


// Route protégée
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/medecins', [MedecinsController::class, 'index'])->middleware('auth')->name('medecins.index');
Route::post('/medecins', [MedecinsController::class, 'store'])->middleware('auth')->name('medecins.store');
Route::get('/medecins/{id}/edit', [MedecinsController::class, 'edit'])->middleware('auth')->name('medecins.edit');
Route::put('/medecins/{id}', [MedecinsController::class, 'update'])->middleware('auth')->name('medecins.update');
Route::delete('/medecins/{id}', [MedecinsController::class, 'destroy'])->middleware('auth')->name('medecins.destroy');


Route::get('/patients', [PatientsController::class, 'index'])->middleware('auth')->name('patients.index');
Route::post('/patients', [PatientsController::class, 'store'])->middleware('auth')->name('patients.store');
Route::get('/patients/{id}/edit', [PatientsController::class, 'edit'])->middleware('auth')->name('patients.edit');
Route::put('/patients/{id}', [PatientsController::class, 'update'])->middleware('auth')->name('patients.update');
Route::delete('/patients/{id}', [PatientsController::class, 'destroy'])->middleware('auth')->name('patients.destroy');

Route::get('/consultations', function(){
    return view('consultations');
})->middleware('auth')->name('consultations');

Route::get('/rendezvous', function(){
    return view('rendezvous');
})->middleware('auth')->name('rendezvous');

Route::get('/comptabilites', function(){
    return view('comptabilites');
})->middleware('auth')->name('comptabilites');


// Correction de la syntaxe de fermeture de la route principale