<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function event(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required',
        ]);

        $channelClassName = '\App\Events\\' . $request->channel;

        if (class_exists($channelClassName)) {
            event(new $channelClassName($request->data));
        } else {
            return response()->json(["response" => "Canal no identificado"], 400);
        }

        return response()->json([
            "response" => "Evento ejecutado con exito",
        ]);
    }
    
}
