<?php

use App\Livewire\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/karyawan',KaryawanController::class);

Route::get('/inventory',InventoryController::class);
