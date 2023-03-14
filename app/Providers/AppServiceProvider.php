<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }
        $Global_recived_date = Carbon::tomorrow();
        $today = Carbon::today();

        $nextMonday = $today->copy()->next(Carbon::MONDAY);
        $nextWednesday = $today->copy()->next(Carbon::WEDNESDAY);
        $nextFriday = $today->copy()->next(Carbon::FRIDAY);



        view()->share('Global_recived_date', $Global_recived_date);
        // view()->share('orderDate', $orderDate);
        view()->share('nextMonday', $nextMonday);
        view()->share('nextWednesday', $nextWednesday);
        view()->share('nextFriday', $nextFriday);
    }
}
