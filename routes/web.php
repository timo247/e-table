<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\EtablissementController;
use App\Http\Requests\ConsommationRequest;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('logout', [LoginController::class, 'logout']);

Route::get('etablissements', [EtablissementController::class, 'showEtablissements']);

Route::resource('consommations', ConsommationController::class, ['except'=>['index', 'show', 'create', 'store']]);

Route::get('consommations/{etablissementId}', function($etablissementId){
$consommationController = new ConsommationController(); 
return $consommationController->index($etablissementId);   
})->name('consommations.index');

Route::get('consommations/create/{etablissementId}', function($etablissementId)
{
$consommationController = new ConsommationController;
return $consommationController->create($etablissementId);
})->name('consommations.create');

Route::post('consommations/{etablissementId}', [ConsommationController::class, 'store']);

Route::get('consommation/show/{consommationId}', function($consommationId)
{
$consommationController = new ConsommationController;
return $consommationController->show($consommationId);
})->name('consommations.show');

Route::get('consommations/categorie/{categorie}/{etablissementId}', function($categorie, $etablissementId){
$consommationController = new ConsommationController;
return $consommationController->showConsommationsByCategorie($categorie, $etablissementId);    
});






