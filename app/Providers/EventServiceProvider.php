<?php

namespace App\Providers;

use App\Events\OnLogin;
use App\Events\OnLogout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\LogoutHistory;
use App\Listeners\LoginHistory;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        onLogin::class =>
        [
            LoginHistory::class,
//            CreateOrUpdateToken::class,
        ],
        onLogout::class =>
            [
                LogoutHistory::class,
//            CreateOrUpdateToken::class,
            ],
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
