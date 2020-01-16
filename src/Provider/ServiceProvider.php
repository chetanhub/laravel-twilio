<?php
namespace LaravelChetanTwilio\Twilio\Provider;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Twilio - ServicePrivider to support integration with Laravel framework 
 *
 * @package  Twilio
 * @version  0.0.1
 * @author   chetandeep <chetandeep@singsys.com>
 */ 

class ServiceProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Support\ServiceProvider
     */
    protected $provider;

    /**
     * Boot method.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
    }

    /**
     * @return \Illuminate\Support\ServiceProvider
     */
    protected function provider()
    {
        if (method_exists(\Illuminate\Foundation\Application::class, 'singleton')) {
            $this->app->singleton('twilio', function($app) {
                return new Twilio;
            });
        } else {
            $this->app['twilio'] = $this->app->share(function($app) {
                return new Twilio;
            });
        }
    }
}
