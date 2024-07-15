<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/content', [ContentController::class, 'index'])->name('content.index');

Route::post('/contacts', [ContactController::class,'store'])->name('contacts.store');
