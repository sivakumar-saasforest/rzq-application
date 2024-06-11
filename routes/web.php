<?php

use Illuminate\Support\Facades\Route;
use RzqApplication\Plugin\Http\Controllers\InstallationController;

Route::get('/install', [InstallationController::class, 'index'])->middleware('rzq-auth')->name('intall.index');
