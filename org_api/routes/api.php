<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
  
    return $request->user();
});


//protected router
/*Route::middleware('auth:sanctum')->group(function () {
    //when add 
   // Route::post('/{id}/event', [EventController::class, 'store']);
 
    Route::prefix('{organization:slug}')->group(function () {
        Route::apiResource('events', EventController::class);
        Route::apiResource('attendees', AttendeeController::class);
    });
});*/


/*Route::prefix('{organization')
     ->middleware(['api','identify.tenant'])
     ->group(function () {
    Route::get('events', [EventController::class,'index']);
   
});*/
//Route::apiResource('attendees', AttendeeController::class);
Route::post('/{organization}/attendee', [AttendeeController::class, 'store']);
Route::get('/{slug}/events', [OrganizationController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/organization', [OrganizationController::class, 'store']);
Route::get('/organization', [OrganizationController::class, 'index']);

   