<?php

use App\Http\Controllers\Admin\AudioLibraryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventConroller;
use App\Http\Controllers\Admin\WeeklyServiceConroller;
use App\Http\Controllers\Admin\ContentController;

use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return redirect(route('admin.index'));
})->name('dashboard');

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
    Route::get('/deleteevent/{event}', [EventConroller::class, 'delete'])->name('events.delete');

    Route::get('/weekly-services', [WeeklyServiceConroller::class, 'index'])->name('weekly_services.index');
    Route::get('/weekly-services/create', [WeeklyServiceConroller::class, 'create'])->name('weekly_services.create');
    Route::post('/weekly-services', [WeeklyServiceConroller::class,'store'])->name('weekly_services.store');
    Route::get('/weekly-services/{service}/edit', [WeeklyServiceConroller::class, 'edit'])->name('weekly_services.edit');
    Route::put('/weekly-services/{service}', [WeeklyServiceConroller::class, 'update'])->name('weekly_services.update');
    Route::get('/weekly-services/{service}/delete', [WeeklyServiceConroller::class, 'delete'])->name('weekly_services.delete');

    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
    Route::get('/content/create', [ContentController::class, 'create'])->name('content.create');
    Route::post('/content', [ContentController::class,'store'])->name('content.store');
    Route::get('/content/{content}/edit', [ContentController::class, 'edit'])->name('content.edit');
    Route::put('/content/{content}', [ContentController::class, 'update'])->name('content.update');
    Route::get('/content/{content}/delete', [ContentController::class, 'delete'])->name('content.delete');

    Route::get('/audio-library', [AudioLibraryController::class, 'index'])->name('audio-library.index');
    Route::get('/audio-library/create', [AudioLibraryController::class, 'create'])->name('audio-library.create');
    Route::post('/audio-library', [AudioLibraryController::class,'store'])->name('audio-library.store');
    Route::get('/audio-library/{audioLibrary}/edit', [AudioLibraryController::class, 'edit'])->name('audio-library.edit');
    Route::post('/audio-library/{audioLibrary}', [AudioLibraryController::class, 'update'])->name('audio-library.update');
    Route::get('/audio-library/{audioLibrary}', [AudioLibraryController::class, 'show'])->name('audio-library.show');
    Route::get('/audio-library/{audioLibrary}/delete', [AudioLibraryController::class, 'destroy'])->name('audio-library.delete');
});

