<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogworkController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ThienController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('admin/login', [LoginController::class, 'postLogin'])->name('login-post');
//forgot password
Route::get('admin/forgot', [PasswordController::class, 'getForgot'])->name('forgot');
Route::post('admin/forgot', [PasswordController::class, 'postForgot'])->name('forgot-password-post');
Route::group(['prefix' => 'admin', 'middleware' => 'check_login'], function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('change', [PasswordController::class, 'changePassword'])->name('change');
    Route::put('change', [PasswordController::class, 'updatePassword'])->name('update-password');
    // // Route::get('employees', [EmployeeController::class,'index'])->name('employees-index');
    // Route::get('employees', [ThienController::class,'index'])->name('thien');

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');



    Route::get('/employees', [EmployeeController::class, 'index'])
        ->name('employees.index');
    // Tạo route để hiển thị Form thêm mới 1 Task (Method GET)
    Route::get('/employees/create', [EmployeeController::class, 'create'])
        ->name('employees.create');

    // Tạo route để nhận dữ liệu từ Form thêm mới (Method POST)
    Route::post('/employees', [EmployeeController::class, 'store'])
        ->name('employees.store');

    // Tạo route để hiển thị Show Form edit dữ liệu (Method GET)
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])
        ->name('employees.edit');

    // Tạo route để nhận dữ liệu từ Form Edit (Method PUT)
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])
        ->name('employees.update');

    Route::put('/employees/ajax/{id}', [EmployeeController::class, 'updateAjax'])
        ->name('employees.ajax');

    // Tạo route để xem chi tiết 1 record có trong table
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])
        ->name('employees.show');

    // Tạo 1 route để xoá 1 record
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])
        ->name('employees.destroy');


    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('tasks.index');

    Route::get('/tasks/create', [TaskController::class, 'create'])
        ->name('tasks.create');
    // Tạo route để nhận dữ liệu từ Form thêm mới (Method POST)
    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');
    // Tạo route để hiển thị Show Form edit dữ liệu (Method GET)
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');

    // Tạo route để nhận dữ liệu từ Form Edit (Method PUT)
    Route::put('/tasks/{id}', [TaskController::class, 'update'])
        ->name('tasks.update');

    // Tạo route để xem chi tiết 1 record có trong table
    Route::get('/tasks/{id}', [TaskController::class, 'show'])
        ->name('tasks.show');

    // Tạo 1 route để xoá 1 record
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');






    //bảng thu chi
    Route::get('/receipts', [ReceiptController::class, 'index'])
        ->name('receipts.index');

    Route::get('/receipts/create', [ReceiptController::class, 'create'])
        ->name('receipts.create');
    // Tạo route để nhận dữ liệu từ Form thêm mới (Method POST)
    Route::post('/receipts', [ReceiptController::class, 'store'])
        ->name('receipts.store');
    Route::get('/receipts/{id}/edit', [ReceiptController::class, 'edit'])
        ->name('receipts.edit');

    // Tạo route để nhận dữ liệu từ Form Edit (Method PUT)
    Route::put('/receipts/{id}', [ReceiptController::class, 'update'])
        ->name('receipts.update');

    // Tạo route để xem chi tiết 1 record có trong table
    Route::get('/receipts/{id}', [ReceiptController::class, 'show'])
        ->name('receipts.show');

    // Tạo 1 route để xoá 1 record
    Route::delete('/receipts/{id}', [ReceiptController::class, 'destroy'])
        ->name('receipts.destroy');


    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/{id}', [ReceiptController::class, 'show'])
        ->name('reports.show');

    //chấm công
    Route::get('/logworks', [LogworkController::class, 'index'])
        ->name('logworks.index');
    // Tạo route để hiển thị Form thêm mới 1 Task (Method GET)
    Route::get('/logworks/create', [LogworkController::class, 'create'])
        ->name('logworks.create');

    // Tạo route để nhận dữ liệu từ Form thêm mới (Method POST)
    Route::post('/logworks', [LogworkController::class, 'store'])
        ->name('logworks.store');

    // Tạo route để hiển thị Show Form edit dữ liệu (Method GET)
    Route::get('/logworks/{id}/edit', [LogworkController::class, 'edit'])
        ->name('logworks.edit');

    // Tạo route để nhận dữ liệu từ Form Edit (Method PUT)
    Route::put('/logworks/{id}', [LogworkController::class, 'update'])
        ->name('logworks.update');

    // Tạo route để xem chi tiết 1 record có trong table
    Route::get('/logworks/{id}', [LogworkController::class, 'show'])
        ->name('logworks.show');

    // Tạo 1 route để xoá 1 record
    Route::delete('/logworks/{id}', [LogworkController::class, 'destroy'])
        ->name('logworks.destroy');

    //luong
    Route::get('/salaries', [SalaryController::class, 'index'])
        ->name('salaries.index');
});

// Route::get('/login', [LoginController::class, 'getLogin'])
//   ->name('login');