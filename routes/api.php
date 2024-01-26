<?php

use App\Http\Controllers\ChannelEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/response_event', function(){
    event(new App\Events\EhTestEvent('Hola Seba respuesta'));

    return response()->json([
        "response" => "Evento ejecutado",
        'success' => true,
    ]);
});

// Channel Event Controller (events)
Route::controller(ChannelEventController::class)->prefix('events')->group(function () {
    Route::post('/check-in', 'check_in');
    Route::post('/check-out', 'check_out');
});

Route::post('/event', [ChannelEventController::class, 'event']);

