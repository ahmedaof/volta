
<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Distripution;
use App\Http\Livewire\User;
use Illuminate\Support\Facades\Route;

// add route group with middleware 
Route::group(['middleware' => ['auth:web']], function () {
Route::get('/', Dashboard::class)->name('dashboard');
// user
Route::get('/user', User::class)->name('user');
// distribution
Route::get('/distribution', Distripution::class)->name('distribution');
});