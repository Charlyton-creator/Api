<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//|-------------------|     API ROUTES      |-------------------------|

Route::post('/todos', [TodoController::class, 'store']); // Store a new todo element

Route::get('/ListOfTodos', [TodoController::class, 'index']); // Get All The Todos

Route::get('/getTodo/{id}', [TodoController::class, 'show']); // get a Todo By Id

Route::patch('/updateTodo/{id}', [TodoController::class, 'update']); // update a Todo

Route::delete('/deleteTodo/{id}', [TodoController::class, 'delete']); // delete a Todo

//|-------------------|     API ROUTES for Jwt Athentication      |-------------------------|

Route::post('/login', [AuthController::class, 'login']); // log the user

Route::post('/register', [AuthController::class, 'register']); // user registration

Route::post('/logout', [AuthController::class, 'logout']); // logout the user

Route::post('/refresh', [AuthController::class, 'refresh']); // log the user



