<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Главная страница — список заметок
Route::get('/', [NoteController::class, 'index'])->name('notes.index');

// Полный набор CRUD-маршрутов для заметок
Route::resource('notes', NoteController::class);
