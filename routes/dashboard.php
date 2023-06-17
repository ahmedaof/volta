
<?php

use App\Http\Livewire\Customers;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Distripution;
use App\Http\Livewire\Family;
use App\Http\Livewire\MainProject;
use App\Http\Livewire\PanelDetails;
use App\Http\Livewire\PanelStatisics;
use App\Http\Livewire\PanelsType;
use App\Http\Livewire\Plans;
use App\Http\Livewire\Project;
use App\Http\Livewire\ProjectsShow;
use App\Http\Livewire\User;
use Illuminate\Support\Facades\Route;

// add route group with middleware 
Route::group(['middleware' => ['auth:web']], function () {
Route::get('/', Dashboard::class)->name('dashboard');
// user
Route::get('/user', User::class)->name('user');
// distribution
Route::get('/distribution', Distripution::class)->name('distribution');
// projects
Route::get('/projects', Project::class)->name('projects');

// customers
Route::get('/customers', Customers::class)->name('customers');

// showprojects
Route::get('/showprojects', MainProject::class)->name('showprojects');

// ProjectsShow
Route::get('/ProjectsShow/{project_id}', ProjectsShow::class)->name('projects.show');

// panelstype
Route::get('/panelstype', PanelsType::class)->name('panelstype');

// panels 
Route::get('/panels/{project_id}', Plans::class)->name('plans');

// PanelDetails
Route::get('/PanelDetails/{panel_id}', PanelDetails::class)->name('PanelDetails');

// panelStatisics
Route::get('/panelStatisics/{tab_id}', PanelStatisics::class)->name('panelStatisics');

// families
Route::get('/families',Family::class)->name('families');
});