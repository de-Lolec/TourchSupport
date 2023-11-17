<?php

use App\Livewire\Company;
use App\Livewire\Home;
use App\Livewire\Portfolio;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/portfolio', Portfolio::class);
Route::get('/company', Company::class);
