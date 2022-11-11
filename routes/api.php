<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;
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
// view data route
Route::get("view",[apiController::class,'view']);

// get data with id
Route::get("viewWithId/{id}",[apiController::class,'viewWithId']);

// post data into db route
Route::post("insert",[apiController::class,'save']);

// put update data in db route
Route::put("update",[apiController::class,'update']);

// search api 
Route::get('search/{name}',[apiController::class,'search']);

// delete api
Route::delete('delete/{id}',[apiController::class,'delete']);

// image upload
Route::post('upload',[apiController::class,'upload']);
