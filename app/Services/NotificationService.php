<?php

namespace app\Services;

use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function notify($message, $redirectTo)
    {
        Session::flash('notification', $message);

        return redirect($redirectTo);
    }
}