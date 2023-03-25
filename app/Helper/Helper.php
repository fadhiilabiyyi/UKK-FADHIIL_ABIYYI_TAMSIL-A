<?php

namespace App\Helper;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class Helper {
    public static function logging($history)
    {
        if (Auth::guard('community')->check()) {
            $username = Auth::guard('community')->user()->username;
            $role = 'community';
        } elseif(Auth::guard('officer')->check()) {
            $username = Auth::guard('officer')->user()->username;
            $role = Auth::guard('officer')->user()->level;
        } else {
            $username = 'Guest';
            $role = 'Guest';
        }
        $log[] = new Log();
        $log['history'] = $history;
        $log['username'] = $username;
        $log['role'] = $role;
        Log::create($log);
    }
}
