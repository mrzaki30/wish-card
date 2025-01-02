<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Birthday\Index::class)->name('birthday.index');
Route::get('/list-wish', \App\Livewire\Birthday\ListWishes::class)->name('wish.index');
Route::get('/show{id}',\App\Livewire\Birthday\Show::class)->name('wishes.show');
