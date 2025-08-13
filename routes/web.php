<?php

use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\MedecinsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialitesController;
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

Route::resource('specialites', SpecialitesController::class)->middleware('auth')->except(['show']);
Route::resource('medecins', MedecinsController::class)->middleware('auth')->except(['show']);
Route::resource('patients', PatientsController::class)->middleware('auth')->except(['show']);
Route::resource('consultations', ConsultationsController::class)->middleware('auth')->except(['show']);
Route::resource('/rendezvous', RendezvousController::class)->middleware('auth')->except(['show']);
Route::resource('services', ServiceController::class)->middleware('auth')->except(['show']);

Route::get('/comptabilites', function(){
    return view('comptabilites');
})->middleware('auth')->name('comptabilites');


// Correction de la syntaxe de fermeture de la route principale