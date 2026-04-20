<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['fr', 'en'])) {
        Session::put('locale', $lang);
    }

    return back();
})->name('change.lang');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');

    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');

    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');

    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');

    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');

    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    Route::patch('/services/{service}/featured', [ServiceController::class, 'toggleFeatured'])->name('admin.services.toggleFeatured');

});

require __DIR__.'/auth.php';