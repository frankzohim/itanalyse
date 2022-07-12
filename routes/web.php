<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnOverController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TurnOverCompanyController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('homepage');
Route::group(['middleware' => ['auth']], function () {
		
                Route::post('/store/update/out', [StoreController::class, 'updateOut'])->name('store.update.out');
                Route::post('/store/update/machine', [StoreController::class, 'updateMachine'])->name('store.update.machine');
								Route::resources([
									'turnover' => TurnOverController::class,
									'turnovercompany' => TurnOverCompanyController::class,
									'return' => ReturnController::class,
									'company' => CompanyController::class,
									'provider' => ProviderController::class,
									'store' => StoreController::class,
								]);
								
								Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

								Route::get('/top20', [CompanyController::class, 'top20'])->name('top20');

								Route::get('/suivi-commande', function(){ 
									return view('command');
								})->name('command');
	});
        
 
	
	Route::group(['prefix' => 'admin'], function () {
		Voyager::routes();
	});
require __DIR__.'/auth.php';
