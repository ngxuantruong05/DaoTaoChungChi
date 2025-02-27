<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [adminController::class, 'adminhome'])->name('adminhome');;

Route::get('/khoa-hoc', [adminController::class, 'khoa_hoc']);

route::get('/add-course', [adminController::class, 'add_course_form'])->name('admin.add_course_form');

route::post('/add-course', [adminController::class, 'add_course'])->name('add_course');
