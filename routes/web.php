<?php

use App\Livewire\BukuController;
use App\Livewire\InventoryController;
use App\Livewire\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::resource('/karyawan',KaryawanController::class);

Route::get('/inventory',InventoryController::class);

Route::get('/buku',BukuController::class);

Route::get('/report',ReportController::class);
