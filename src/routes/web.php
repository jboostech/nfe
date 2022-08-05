<?php

use Illuminate\Support\Facades\Route;

Route::get('/boostech/nfe', [Boostech\Nfe\Controllers\HnfexController::class, 'index'])->name('boostech_nfe.index');
