<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// welcome route
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/featured', [WelcomeController::class, 'featuredPost'])->name('featured');
Route::get('/latest', [WelcomeController::class, 'latest'])->name('latest');
Route::get('/archive', [WelcomeController::class, 'archive'])->name('archive');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');



Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashbord', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/blog', [AdminCategoriesController::class, 'blog'])->name('blog');
    Route::get('/blog-categories', [AdminCategoriesController::class, 'blogcategories'])->name('blogcategories');
    Route::post('/category', [AdminCategoriesController::class, 'store'])-> name('admin.category.store');
    Route::put('/update-category/{id}', [AdminCategoriesController::class, 'update'])-> name('admin.category.update');
    Route::delete('/delete-category/{id}', [AdminCategoriesController::class, 'destroy'])-> name('admin.category.destroy');
    Route::resource('/posts', PostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
