<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/file-upload', [FileUploadController::class, 'create'])->name('file.upload');
Route::post('/file-upload', [FileUploadController::class, 'store'])->name('file.upload.store');
