<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LockScreenController;
use App\Http\Middleware\CheckIfLocked;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function (){
    // Lock screen routes
    Route::get('/lock', [LockScreenController::class, 'show'])->name('lock');
    Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');

    // Resources
    Route::resource('tasks', Controllers\TaskController::class);
    Route::resource('users', Controllers\UserController::class);
});

Route::get('/testroute', function() {
    $name = "Funny Coder";
    Mail::to("victor.mbugu@strathmore.edu")->send(new MyProjectEmail($name));
});

route::get('/home',[HomeController::class, 'index']);
route::get('/adminpage',[HomeController::class, 'page'])->middleware(['auth', 'admin']);