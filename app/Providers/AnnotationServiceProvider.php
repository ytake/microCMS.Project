<?php
namespace MicroApp\Providers;

use MicroApp\Console\Commands\RouteScanCommand;
use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

/**
 * Class AnnotationServiceProvider
 * @package MicroApp\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AnnotationServiceProvider extends ServiceProvider
{

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        'MicroApp\Http\Controllers\Controller',
        'MicroApp\Http\Controllers\AuthController',
        'MicroApp\Http\Controllers\Managed\IndexController'
    ];

    /**
     * The classes to scan for model annotations.
     *
     * @var array
     */
    protected $scanModels = [];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = false;

    /**
     * Determines whether or not to automatically scan the controllers
     * directory (App\Http\Controllers) for routes
     *
     * @var bool
     */
    protected $scanControllers = false;

    /**
     * Determines whether or not to automatically scan all namespaced
     * classes for event, route, and model annotations.
     *
     * @var bool
     */
    protected $scanEverything = false;

    /**
     * Register the command
     * @return void
     */
    protected function registerRouteScanCommand()
    {
        $this->app->singleton('command.route.scan', function ($app) {
            return new RouteScanCommand($app['files'], $this);
        });
    }

}
