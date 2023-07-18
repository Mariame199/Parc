<?php

use App\Http\Livewire\Clients;
use App\Http\Livewire\Employecmp;
use App\Http\Livewire\TypeVoitureCmp;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\VoitureCmp;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');

});




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/autorisations/utilisateurs',Utilisateurs ::class)->name('utilisateurs');

//->middleware('can:admin');
Route::get('/rolespermissions', [App\Http\Controllers\UserController::class, 'index'])->name('rolespermissions');
Route::get('/gestionvoiture/typevoitures',TypeVoitureCmp  ::class)->name('typevoitures');
Route::get('gestionvoiture/voitures', VoitureCmp::class)->name("voitures");


Route::get('/gestionclients', Clients::class)->name("gestionclients");
Route::get('/gestionemployes', Employecmp::class)->name("gestionemployes");

Route::group([
    'middleware'=> ["auth", "auth.employe"],

    'as'=> 'employe'
], function (){

    Route::get('/clients',Clients ::class)->name('clients.index');

});


