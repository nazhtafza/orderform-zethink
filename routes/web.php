<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndFormController;
use App\Http\Controllers\FormResponseController;
use App\Models\Form;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendFormController::class, 'show'])->name('home');

// Route::get('/', function () {
//     $form = Form::first(); // Ambil form pertama dari database
//     return view('create', compact('form')); // Pastikan ada view 'form.blade.php'
// })->name('home');

Route::post('submit-form',[FrontendFormController::class, 'store'])->name('submit.form');
