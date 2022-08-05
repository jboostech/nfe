<?php

use Illuminate\Support\Facades\Route;

Route::get('nfe', function () {
    echo "Olá NF-e";
});

Route::get('/boostech/nfe', [Boostech\Nfe\Controllers\HnfexController::class, 'index'])->name('boostech_nfe.index');
