<?php

namespace Snigdho\CurrencyExchange\Providers;

use Illuminate\Support\ServiceProvider;

class CurrencyExchangerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'currency-exchanger');
    }
}
