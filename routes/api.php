<?php

use App\Http\Controllers\company\auth\loginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\company\post\CRUDController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['prefix' => 'company/'], function() {
    Route::post('login', [loginController::class, 'login'])->name('login');

});
Route::group(['middleware'=>['auth:company-api'], 'prefix' => 'company/'], function() {
    Route::post('logout', [loginController::class, 'logout'])->name('logout');
    Route::get('posts', [CRUDController::class, 'index'])->name('post.index');
    Route::get('posts/create', [CRUDController::class, 'create'])->name('post.create');
    Route::patch('posts/update/{id}', [CRUDController::class, 'update'])->name('post.update');
    Route::delete('posts/delete/{id}', [CRUDController::class, 'delete'])->name('post.delete');
});
