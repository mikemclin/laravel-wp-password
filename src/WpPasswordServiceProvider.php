<?php namespace MikeMcLin\WpPassword;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class WpPasswordServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('mikemclin/wp-password');

        AliasLoader::getInstance()->alias('WpPassword', 'MikeMcLin\WpPassword\WpPassword');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}