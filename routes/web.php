<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AboutSectionController;

/*
|--------------------------------------------------------------------------
| Language Switch
|--------------------------------------------------------------------------
*/
Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['fr', 'en'])) {
        Session::put('locale', $lang);
    }
    return back();
})->name('change.lang');

/*
|--------------------------------------------------------------------------
| Front Website
|--------------------------------------------------------------------------
*/

// Home (Hero dynamic)
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Hero Section
    |--------------------------------------------------------------------------
    */
    Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::post('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');

    /*
    |--------------------------------------------------------------------------
    | Services CRUD
    |--------------------------------------------------------------------------
    */
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::patch('/services/{service}/toggle-featured', [ServiceController::class, 'toggleFeatured'])->name('services.toggleFeatured');



// Footer
    Route::get('/footer/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/footer/update', [FooterController::class, 'update'])->name('footer.update');



    Route::get('/why-choose-us/edit', [WhyChooseUsController::class, 'edit'])->name('why-choose-us.edit');
Route::post('/why-choose-us/update', [WhyChooseUsController::class, 'update'])->name('why-choose-us.update');




Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
Route::patch('/testimonials/{testimonial}/toggle-featured', [TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggleFeatured');



Route::get('/about/edit', [AboutSectionController::class, 'edit'])->name('about.edit');
Route::post('/about/update', [AboutSectionController::class, 'update'])->name('about.update');


});








/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze / Jetstream / Fortify)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';