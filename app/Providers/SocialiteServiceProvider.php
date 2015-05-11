<?php
namespace MicroApp\Providers;

use Laravel\Socialite\SocialiteManager;
use MicroApp\Authenticate\SocialiteUserProvider;
use Laravel\Socialite\SocialiteServiceProvider as Provider;


/**
 * for laravel socialite provider
 * Class SocialiteServiceProvider
 * @package MicroApp\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SocialiteServiceProvider extends Provider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('Laravel\Socialite\Contracts\Factory', function ($app) {
            $app->configure('services');
            return new SocialiteManager($app);
        });
        $this->app['auth']->extend('socialite', function($app) {
            return new SocialiteUserProvider(
                $app->make('Laravel\Socialite\Contracts\Factory'),
                $app->make('MicroApp\Repositories\UserRepositoryInterface')
            );
        });
    }
}
