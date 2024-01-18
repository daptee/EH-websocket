<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\EhTestEvent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PusherController extends Controller
{
    public function index()
    {
        broadcast(new EhTestEvent("holaaa"));
        return view('index');
    }

    public function broadcast(Request $request)
    {
        broadcast(new EhTestEvent($request->get('message')))->toOthers();

        return view('broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
}
