<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Category
Route::get('/',[CategoryController::class,'getAllCategories']);
Route::get('/getCategoryById/{id}',[CategoryController::class,'getCategoryById']);
Route::post('/',[CategoryController::class,'createCategory']);
Route::delete('/deleteCategory/{id}',[CategoryController::class,'deleteCategory']);
Route::post('/updateCategory/{id}',[CategoryController::class,'updateCategory']);

// Item
Route::get('/items',[ItemController::class,'getAllItems']);
Route::get('/getItemById/{id}',[ItemController::class,'getItemById']);
Route::post('/items',[ItemController::class,'createItem']);
Route::delete('/deleteItem/{id}',[ItemController::class,'deleteItem']);
Route::post('/updateItem/{id}',[ItemController::class,'updateItem']);

// Message
Route::get('/messages',[MessageController::class,'getAllMessages']);
Route::get('/getMessageById/{id}',[MessageController::class,'getMessageById']);
Route::post('/messages',[MessageController::class,'createMessage']);
Route::delete('/deleteMessage/{id}',[MessageController::class,'deleteMessage']);
Route::post('/updateMessage/{id}',[MessageController::class,'updateMessage']);

// User
Route::get('/users',[UserController::class,'getAllUsers']);
Route::get('/getUserById/{id}',[UserController::class,'getUserById']);



Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'authenticate']);

// Add this group route to all the routes that must can be accessed if logged in
// Route::group(['middleware' => ['jwt.verify']], function() {  
// });
