<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('private-event', function ($user) {
    return true;
});

Broadcast::channel('events', function () {
    return true; // Puedes implementar lógica de autorización aquí si es necesario
});

// Broadcast::listen('EhTestEvent', function ($data) {
//     // Maneja el evento privado recibido
//     info('Evento privado recibido en Laravel', ['data' => $data]);

//     // Puedes realizar otras acciones con la información del evento privado
//     event(new \App\Events\EhTestEvent(['responseMessage' => 'Respuesta desde Laravel' , 'data' => $data]));
// });


// Broadcast::listen('EhTestEvent', function ($data) {
//     // Maneja el evento Whisper recibido
//     // info('Evento Whisper recibido en Laravel', ['data' => $data]);

//     // Emite un evento de respuesta a través de WebSockets
//     event(new \App\Events\EhTestEvent(['responseMessage' => 'Respuesta desde Laravel' , 'data' => $data]));

//     // Puedes realizar otras acciones con la información del evento Whisper
// });