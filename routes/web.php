<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Article;
use App\Livewire\Article\ShowArticle;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Admin Routes
Route::group(['middleware' => ['role:admin']], function () { 

    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Users
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('user.index');

    Route::get('/users/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    })->name('user.show');

});

// List article
Route::get('/list/articles', function () {
    return view('articles.list');
})->name('list-article');

// Create Article
Route::get('/articles', function () {
    return view('articles.create');
})->name('create-article');

// Display Article
Route::get('/articles/index', function () {
    return view('articles.index');
})->name('display-article');

// Display Single Article
Route::get('/articles/{article}', ShowArticle::class)->name('article.show');

// Edit Article
Route::get('/articles/{article}/edit', function (Article $article) {
    return view('articles.edit', ['article' => $article]);
})->name('edit-article');

// User Routes
Route::group(['middleware' => ['auth','accepted.terms']], function () { 

    // User Dashboard
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


