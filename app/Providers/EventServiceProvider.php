<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\Entries;
use App\Models\Supplier;
use App\Observers\EntriesObserver;
use App\Observers\SupplierObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * The model observers for your application.
     *
     * @var array
     */
    // protected $observers = [
    //     Supplier::class => [SupplierObserver::class],
    // ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
