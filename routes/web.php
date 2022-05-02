<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\EtablissementController;

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

Route::resource('voitures', VoituresController::class, ['except'=>['show','edit','update']]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [LoginController::class, 'logout']);

Route::get('voitures/accessoire/{accessoire}', [VoituresController::class,
'voituresAyantAccessoire']);

Route::get('etablissements', [EtablissementController::class, 'showEtablissements']);

Route::resource('consommations', ConsommationController::class, ['except'=>['index', 'show','edit','update']]);
Route::get('consommations/{etablissementId}', [ConsommationController::class,'index']);




