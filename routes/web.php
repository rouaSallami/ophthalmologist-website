<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\ContactMessage;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/appointment', [AppointmentController::class, 'create'])
    ->name('appointment.create');

Route::post('/appointment', [AppointmentController::class, 'store'])
    ->name('appointment.store');

Route::post('/contact', [ContactMessageController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {

    return view('admin.dashboard', [
        'servicesCount' => Service::count(),
        'appointmentsCount' => Appointment::count(),
        'testimonialsCount' => Testimonial::count(),
        'messagesCount' => ContactMessage::count(),
    ]);

})->name('dashboard');

        // Hero Section
        Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
        Route::post('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');

        // Services CRUD
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
        Route::patch('/services/{service}/toggle-featured', [ServiceController::class, 'toggleFeatured'])
            ->name('services.toggleFeatured');

        // Footer
        Route::get('/footer/edit', [FooterController::class, 'edit'])->name('footer.edit');
        Route::post('/footer/update', [FooterController::class, 'update'])->name('footer.update');

        // Why Choose Us
        Route::get('/why-choose-us/edit', [WhyChooseUsController::class, 'edit'])
            ->name('why-choose-us.edit');
        Route::post('/why-choose-us/update', [WhyChooseUsController::class, 'update'])
            ->name('why-choose-us.update');

        // Testimonials CRUD
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
        Route::patch('/testimonials/{testimonial}/toggle-featured', [TestimonialController::class, 'toggleFeatured'])
            ->name('testimonials.toggleFeatured');

        // About
        Route::get('/about/edit', [AboutSectionController::class, 'edit'])->name('about.edit');
        Route::post('/about/update', [AboutSectionController::class, 'update'])->name('about.update');

        // Appointments Admin
        Route::get('/appointments', [AdminAppointmentController::class, 'index'])
            ->name('appointments.index');

        Route::get('/appointments/{appointment}', [AdminAppointmentController::class, 'show'])
            ->name('appointments.show');

        Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])
            ->name('appointments.status');

        Route::delete('/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])
            ->name('appointments.destroy');

            Route::get('/messages', [AdminContactMessageController::class, 'index'])
    ->name('messages.index');

Route::get('/messages/{message}', [AdminContactMessageController::class, 'show'])
    ->name('messages.show');

Route::delete('/messages/{message}', [AdminContactMessageController::class, 'destroy'])
    ->name('messages.destroy');


            
    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';