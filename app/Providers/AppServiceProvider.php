<?php
namespace MicroApp\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package MicroApp\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
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
        $this->app->bind(
            'MicroApp\Services\InitializeServiceInterface',
            'MicroApp\Services\InitializeService'
        );
        $this->app->bind(
            'MicroApp\Repositories\EnvironmentRepositoryInterface',
            'MicroApp\Repositories\File\EnvironmentRepository'
        );
        $this->app->bind(
            'MicroApp\Repositories\UserRepositoryInterface',
            'MicroApp\Repositories\Eloquent\UserRepository'
        );
    }
}
