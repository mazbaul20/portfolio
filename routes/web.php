<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroSectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// custom routes
Route::middleware('auth')->group(function(){
    Route::get('/dashboard-logout',[DashboardController::class,'Logout']);
    //hero-section routes
    Route::controller(HeroSectionController::class)->group(function(){
        // page route
        Route::get('/hero-section','HeroSectionPage')->name('hero.section');
        // end page
        
        Route::post('/create-herosection','CreateHeroSection');
        Route::get('/list-herosection','HeroSectionList');
        Route::post('/herosection-by-id','HeroSectionById');
        Route::post('/update-herosection','UpdateHeroSection');
        Route::post('/delete-herosection','DeleteHeroSection');
    });
});

require __DIR__.'/auth.php';
