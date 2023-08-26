<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\TovarController;
use Illuminate\Http\Request;

Route::post('/register', [AuthUser::class, 'register']);
Route::post('/login', [AuthUser::class, 'login']);

/* Запросы только для авторизованных */
Route::group(['middleware' => ['auth:sanctum']], function () {
	Route::get('/tovars', [TovarController::class, 'getAll']);
	Route::get('/tovars/{tovarId}', [TovarController::class, 'getById']);

	/* Запросы только для админа */
	Route::post('/tovars', [TovarController::class, 'create'])->middleware('admin');
	Route::delete('/tovars/{tovarId}', [TovarController::class, 'delete'])->middleware('admin');
	Route::put('/tovars/{tovarId}', [TovarController::class, 'update'])->middleware('admin');
});