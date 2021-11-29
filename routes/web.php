<?php

use App\Http\Controllers\UserColorController;
use App\Http\Controllers\UserController;
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

// Get all users list route
Route::get('/', [UserController::class, 'getAllUsers'])->name('user.get_all_users');

// Display all colors route
Route::get('/view_all_colors/{uuid}', [UserController::class, 'viewAllColors'])->name('user.view_all_colors');

// Select user color route
Route::get('/set_user_color/{uuid}/{color_code}', [UserColorController::class, 'setUserColor'])->name('user.set_user_color');

// Get all users colors route
Route::get('/get_all_users_colors/{uuid}/{color_code}', [UserController::class, 'getAllUsersColors'])->name('user.get_all_users_colors');

// Update user color route
Route::get('/update_user_color/{uuid}/{old_color_code}/{new_color_code}', [UserColorController::class, 'updateUserColor'])->name('user.update_user_color');

// Delete user color route
Route::get('/delete_user_color/{uuid}/{color_code}', [UserColorController::class, 'deleteUserColor'])->name('user.delete_user_color');