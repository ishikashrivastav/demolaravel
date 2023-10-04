<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);


Route::middleware(['admin'])->group(function () {
    // Admin Login Routes
    Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
// routes/web.php



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Hard delete student
Route::delete('/students/hard-delete/{id}', [StudentController::class, 'hardDelete'])->name('students.hard-delete');


//marks
Route::get('/students/{student}/add-marks', [StudentController::class, 'showAddMarksForm'])->name('students.add-marks');
Route::post('/students/{student}/store-marks', [StudentController::class, 'storeMarks'])->name('students.store-marks');

Route::get('/generate-pdf/{studentId}', [PdfController::class, 'generatePDF'])->name('generate.pdf');

Route::get('/export-students', [ExportController::class, 'exportStudentsAndResults'])->name('export.students');
