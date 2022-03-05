<?php

namespace App\Providers;


use App\View\Components\Seif;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use App\Models\Entries;
use App\Models\Supplier;
use App\Observers\EntriesObserver;
use App\Observers\SupplierObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Supplier::observe(SupplierObserver::class);
        // Entries::observe(EntriesObserver::class);



    }
}
