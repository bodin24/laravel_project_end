<?php

use App\Http\Controllers\AdminProduct;
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

Route::get('/', function () {
    return view('home');
});
Route::get('form', function () {
    return view('form');
});
Route::get('list', function () {
    return view('list');
});
//ดึงข้อมูลไปแสดง
Route::get('/', [AdminProduct::class, 'dataProduct']);
Route::get('list', [AdminProduct::class, 'listData'])->name('list');

//เพิ่มข้อมูล
Route::post('addData', [AdminProduct::class, 'addData'])->name('addData');

//ลบข้อมูล
Route::get('deleteData/{id}', [AdminProduct::class, 'deleteData'])->name('deleteData');

//แก้ไขข้อมูล
Route::get('edit/{id}', [AdminProduct::class, 'editData'])->name('edit');
Route::post('updateData/{id}', [ AdminProduct::class, 'updateData'])->name('updateData');
