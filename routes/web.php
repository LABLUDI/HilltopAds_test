<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/labels', [\App\Http\Controllers\LabelsController::class, 'index']);
Route::get('/labels/show', [\App\Http\Controllers\LabelsController::class, 'show']);
Route::get('/labels/create', [\App\Http\Controllers\LabelsController::class, 'create']);
Route::get('/labels/update', [\App\Http\Controllers\LabelsController::class, 'update']);
Route::get('/labels/delete', [\App\Http\Controllers\LabelsController::class, 'delete']);
