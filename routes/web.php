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


Route::get('/labels/get/{entityId}/{entityType}', [\App\Http\Controllers\LabelsController::class, 'getLabels'])->name('labels.index');
Route::get('/labels/add/{entityId}/{entityType}/{labels}', [\App\Http\Controllers\LabelsController::class, 'addLabels'])->name('labels.create');
Route::get('/labels/update/{entityId}/{entityType}/{labels}', [\App\Http\Controllers\LabelsController::class, 'updateLabels'])->name('labels.update');
Route::get('/labels/delete/{entityId}/{entityType}/{labels}', [\App\Http\Controllers\LabelsController::class, 'deleteLabels'])->name('labels.delete');
