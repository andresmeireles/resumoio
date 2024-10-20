<?php

use App\Livewire\Resume\Resume;
use Illuminate\Support\Facades\Route;

Route::get('/', Resume::class)->name('resume');
