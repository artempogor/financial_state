<?php

namespace App\Listeners;

use App\Events\OnLogout;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogoutHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OnLogin  $event
     * @return void
     */
    public function handle(OnLogout $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        $userinfo = $event->user;
        Log::info('Пользователь вышел',
            [ $userinfo->login, $current_timestamp]
        );
        $saveHistory = DB::table('login_history')->insert(
            ['login' => $userinfo->login,'ikul'=>$userinfo->ikul,'action'=>"Выход", 'created_at' => $current_timestamp, 'updated_at' => $current_timestamp]
        );
        return $saveHistory;
    }
}
