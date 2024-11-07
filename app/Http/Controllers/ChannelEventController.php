<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChannelEventController extends Controller
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

    public function check_in(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required',
        ]);

        if (class_exists('\App\Events\CheckIn')) {
            event(new \App\Events\CheckIn($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }

        return response()->json([
            "response" => "Evento ejecutado con exito",
        ]);
    }

    public function check_out(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required',
        ]);

        if (class_exists('\App\Events\CheckOut')) {
            event(new \App\Events\CheckOut($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }

        return response()->json([
            "response" => "Evento ejecutado con exito",
        ]);
    }

    public function place_order(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required',
        ]);

        if (class_exists('\App\Events\PlaceOrder')) {
            event(new \App\Events\PlaceOrder($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }

        return response()->json([
            "response" => "Evento ejecutado con exito",
        ]);
    }

    public function accept_order(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required',
        ]);

        if (class_exists('\App\Events\AcceptOrder')) {
            event(new \App\Events\AcceptOrder($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }

        return response()->json([
            "response" => "Evento ejecutado con exito",
        ]);
    }

    public function reject_order(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required',
        ]);

        if (class_exists('\App\Events\RejectOrder')) {
            event(new \App\Events\RejectOrder($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }

        return response()->json([
            "response" => "Evento ejecutado con exito",
        ]);
    }

    public function kitchen_order_ready(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required'
        ]);

        if (class_exists('\App\Events\KitchenOrderReady')) {
            event(new \App\Events\KitchenOrderReady($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }
        
        return response()->json(["response" => "Evento ejecutado con exito"]);
    }

    public function barista_order_ready(Request $request)
    {
        $request->validate([
            'channel' => 'required',
            'data' => 'required'
        ]);

        if (class_exists('\App\Events\BaristaOrderReady')) {
            event(new \App\Events\BaristaOrderReady($request->channel, $request->data));
        } else {
            return response()->json(["response" => "Evento no identificado"], 400);
        }

        return response()->json(["response" => "Evento ejecutado con exito"]);
    }
}
