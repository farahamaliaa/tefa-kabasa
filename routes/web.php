<?php

use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [LandingController::class, 'index'])->name('beranda');

Auth::routes();

require_once __DIR__ . '/role/school.php';
require_once __DIR__ . '/role/staff.php';
require_once __DIR__ . '/role/teacher.php';
require_once __DIR__ . '/role/student.php';
require_once __DIR__ . '/role/landing.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cek-rfid', [App\Http\Controllers\HomeController::class, 'cek_rfid']);

Route::post('/send-email', [ContactUsController::class, 'sendMail'])->name('store.send.email');
Route::get('get-students', [ClassroomStudentController::class, 'show']);