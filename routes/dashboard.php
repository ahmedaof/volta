
<?php

use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

// add route group with middleware 
Route::group(['middleware' => ['auth:web']], function () {
Route::get('/', Dashboard::class)->name('dashboard');
});