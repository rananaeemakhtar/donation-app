<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventConroller;

use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return redirect(route('admin.index'));
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

//admin related routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', AdminMiddleware::class]], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
    Route::get('/events', [EventConroller::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventConroller::class, 'create'])->name('events.create');
    Route::post('/store', [EventConroller::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventConroller::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventConroller::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventConroller::class, 'delete'])->name('events.delete');
});

