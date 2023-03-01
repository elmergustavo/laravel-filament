<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        $notificaciones = auth()->user()->unreadNotifications;

        //Limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        return view('notification.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
