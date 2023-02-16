<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

require __DIR__ . '/admin.php';



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');



// Route::get('/login', [LoginController::class, 'getLogin'])
//     ->name('login');



// // Tạo route để hiển thị Form thêm mới 1 Task (Method GET)
// Route::get('/employees/create', [EmployeeController::class, 'create'])
//     ->name('employees.create');

// // Tạo route để nhận dữ liệu từ Form thêm mới (Method POST)
// Route::post('/employees', [EmployeeController::class, 'store'])
//     ->name('employees.store');

// // Tạo route để hiển thị Show Form edit dữ liệu (Method GET)
// Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])
//     ->name('employees.edit');

// // Tạo route để nhận dữ liệu từ Form Edit (Method PUT)
// Route::put('/employees/{id}', [EmployeeController::class, 'update'])
//     ->name('employees.update');

// // Tạo route để xem chi tiết 1 record có trong table
// Route::get('/employees/{id}', [EmployeeController::class, 'show'])
//     ->name('employees.show');

// // Tạo 1 route để xoá 1 record
// Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])
//     ->name('employees.destroy');