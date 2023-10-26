<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CompagnyController;
use App\Http\Controllers\CartSimController;
use App\Http\Controllers\OperateurController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterielSortantController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'machine'], function () {
    Route::get('/getAll ',[MachineController::class, 'index']);
    Route::post('/save',[MachineController::class, 'store']);
    Route::put('/update/{id}',[MachineController::class, 'update']);
    Route::delete('/delete/{id}',[MachineController::class, 'destroy']);
});


Route::group(['prefix' => 'staff'], function () {
    Route::get('/getAll ',[PersonnelController::class, 'index']);
    Route::post('/save',[PersonnelController::class, 'store']);
    Route::put('/update/{id}',[PersonnelController::class, 'update']);
    Route::delete('/delete/{id}',[PersonnelController::class, 'destroy']);
    Route::post('/search',[PersonnelController::class, 'find']);
    Route::post('/filter',[PersonnelController::class, 'filter']);
});

Route::group(['prefix' => 'department'], function () {
    Route::get('/getAll ',[DepartmentController::class, 'index']);
});

Route::group(['prefix' => 'compagny'], function () {
    Route::get('/getAll ',[CompagnyController::class, 'index']);
});


Route::group(['prefix' => 'sim'], function () {
    Route::get('/getAll ',[CartSimController::class, 'index']);
    Route::post('/save',[CartSimController::class, 'store']);
    Route::put('/update/{id}',[CartSimController::class, 'update']);
    Route::delete('/delete/{id}',[CartSimController::class, 'destroy']);
    Route::post('/search',[CartSimController::class, 'find']);
    Route::post('/filter',[CartSimController::class, 'filter']);
});

Route::group(['prefix' => 'operateur'], function () {
    Route::get('/getAll ',[OperateurController::class, 'index']);
});


Route::group(['prefix' => 'cred'], function () {
    Route::get('/getAll ',[CreditController::class, 'index']);
    Route::post('/save',[CreditController::class, 'store']);
    Route::put('/update/{id}',[CreditController::class, 'update']);
    Route::delete('/delete/{id}',[CreditController::class, 'destroy']);
    Route::post('/search',[CreditController::class, 'find']);
    Route::post('/filter',[CreditController::class, 'filter']);
});

Route::group(['prefix' => 'device'], function () {
    Route::get('/getAll ',[DeviceController::class, 'index']);
});

Route::group(['prefix' => 'voice'], function () {
    Route::get('/getAll ',[VoiceController::class, 'index']);
});
Route::group(['prefix' => 'offer'], function () {
    Route::get('/getAll ',[OfferController::class, 'index']);
});

Route::group(['prefix' => 'mat'], function () {
    Route::get('/getAll ',[MaterielController::class, 'index']);
    Route::post('/save',[MaterielController::class, 'store']);
    Route::put('/update/{id}',[MaterielController::class, 'update']);
    Route::delete('/delete/{id}',[MaterielController::class, 'destroy']);
    Route::post('/search',[MaterielController::class, 'find']);
    Route::post('/filter',[PersonnelController::class, 'filter']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/getAll ',[CategoryController::class, 'index']);
});

Route::group(['prefix' => 'matSort'], function () {
    Route::get('/getAll ',[MaterielSortantController::class, 'index']);
    Route::post('/save',[MaterielSortantController::class, 'store']);
    Route::put('/update/{id}',[MaterielSortantController::class, 'update']);
    Route::delete('/delete/{id}',[MaterielSortantController::class, 'destroy']);
    Route::post('/search',[MaterielSortantController::class, 'find']);
    Route::post('/filter',[MaterielSortantController::class, 'filter']);
});