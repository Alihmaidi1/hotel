<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class repo extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind("App\\repo\interfaces\chart","App\\repo\classes\chart");
        $this->app->bind("App\\repo\interfaces\customer","App\\repo\classes\customer");
        $this->app->bind("App\\repo\interfaces\image","App\\repo\classes\image");
        $this->app->bind("App\\repo\interfaces\\room","App\\repo\classes\\room");
        $this->app->bind("App\\repo\interfaces\\type","App\\repo\classes\\type");
        $this->app->bind("App\\repo\interfaces\status","App\\repo\classes\status");
        $this->app->bind("App\\repo\interfaces\service","App\\repo\classes\service");
        $this->app->bind("App\\repo\interfaces\\transaction","App\\repo\classes\\transaction");
        $this->app->bind("App\\repo\interfaces\payment","App\\repo\classes\payment");
        $this->app->bind("App\\repo\interfaces\user","App\\repo\classes\user");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
