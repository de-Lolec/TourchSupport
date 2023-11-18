<?php

use App\Livewire\Home;
use App\Livewire\Support;
use App\Livewire\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/support', Support::class);
Route::get('/team', Team::class);
