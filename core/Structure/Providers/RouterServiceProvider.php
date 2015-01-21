<?php
namespace microCms\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RouterServiceProvider
 * @package microCms\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RouterServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function boot()
    {

    }

    /**
     * @return void
     */
    public function register()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app['router'];

        $router->filter('validator.middleware', 'microCms\Middleware\ValidatorMiddleware');
        $router->filter('csrf', 'microCms\Middleware\CsrfMiddleware');
    }

}
