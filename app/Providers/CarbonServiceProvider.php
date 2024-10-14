<?php

namespace App\Providers;

use Carbon\Carbon;
use Carbon\Laravel\ServiceProvider;

class CarbonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Carbon::macro('toMySqlDate', function () {
            return $this->format('Y-m-d');
        });

        Carbon::macro('toMySqlDateTime', function () {
            return $this->format('Y-m-d H:i:s');
        });
    }

    public function boot() : void
    {

    }
}
