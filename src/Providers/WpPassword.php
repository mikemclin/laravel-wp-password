<?php namespace MikeMcLin\Providers;

use Hautelook\Phpass\PasswordHash;
use Illuminate\Support\ServiceProvider;
use MikeMcLin\Services\WpPassword as WpPasswordService;

class WpPassword extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MikeMcLin\Contracts\WpPassword', function () {
            return new WpPasswordService(new PasswordHash(8, true));
        });
    }

}