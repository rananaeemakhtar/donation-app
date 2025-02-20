<?php

use App\Http\Controllers\Api\AudioLibraryController;
use App\Http\Controllers\Api\WeeklyServiceConroller;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\WeeklyServiceController;
use App\Http\Controllers\Api\MinistriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/services', [WeeklyServiceController::class, 'index'])->name('services.index');
Route::get('/content', [ContentController::class, 'index'])->name('content.index');

Route::post('/contacts', [ContactController::class,'store'])->name('contacts.store');
Route::post('/welcome-card-submission', [ContactController::class, 'contactCard'])->name('contacts.card.store');

Route::get('/audio-library', [AudioLibraryController::class, 'index'])->name('audio-library.index');
Route::get('/ministries', [MinistriesController::class, 'index'])->name('ministries.index');
Route::get('/ministries_by_url/{url}', [MinistriesController::class, 'ministries_by_url'])->name('ministries_by_url.index');
