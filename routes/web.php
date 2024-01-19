<?php

use App\Http\Controllers\PusherController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/event', function () {
    event(new App\Events\EhTestEvent('Hola Seba'));

    return response()->json([
        "response" => "Evento ejecutado",
        'success' => true,
    ]);
});

Route::get('/event/json', function () {
    $data = [
        'nombre' => 'Enzo',
        'apellido' => 'Amarilla',
        'email' => 'enzo100amarilla@gmail.com',
        'telefono' => '1122334455',
        'descripcion' => 'Test Evento',
    ];
    event(new App\Events\EhTestEvent(json_encode($data)));

    return response()->json([
        "response" => "Evento ejecutado",
        'success' => true,
    ]);
});

Route::get('/websockets/serve', function () {
    $output = Artisan::call('websockets:serve --port=443');
    return "Comando ejecutado con éxito. Salida del comando: <br>" . Artisan::output();
});
