<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Article;
use App\Livewire\Article\ShowArticle;
use App\Models\GroupMessage;
use Illuminate\Support\Str;

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

// Footer Pages
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/faq', function () {
    return view('faq');
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
    Route::get('/chat', function () {
        return view('dashboard');
    })->name('user.dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  Create Group
Route::get('/create-group', function () {
    return view('create-group');
})->name('create-group');
// View Group Info
Route::get('/view-group-info/{group}', function (\App\Models\Group $group) {
    return view('view-group-info', ['group' => $group]);
})->name('view-group-info');

// Invite
Route::get('/invite/{link}', function ($link) {
    $group = \App\Models\Group::with('user')->where('link', $link)->firstOrFail();
    return view('invite', compact('group'));
})->name('invite');

Route::match(['get', 'post'], '/group/join/{group}', function (\App\Models\Group $group) {
    $userId = auth()->id();
    
    // Check if user is already a member
    $existing = GroupMessage::where('group_id', $group->id)
        ->where('invited_by', $userId)
        ->first();

    if (!$existing) {
        // First create a message
        $message = \App\Models\Message::create([
            'user_id' => $userId,
            'group_id' => $group->id,
            'body' => 'Requested to join the group',
        ]);

        // Then create the group message
        GroupMessage::create([
            'group_id' => $group->id,
            'message_id' => $message->id,
            'type' => 'pending',
            'invitation_link' => Str::uuid(),
            'invited_by' => $userId,
        ]);

        return  view('group.dashboard', compact('group')) 
            ->with('status', 'Your request to join the group has been sent!');
    }

    return view('group.dashboard', compact('group'))
        ->with('status', 'You have already requested to join this group.');
})->name('group.join');


require __DIR__.'/auth.php';


