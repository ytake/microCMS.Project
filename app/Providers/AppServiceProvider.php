<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\EntryRepositoryInterface',
            'App\Repositories\Eloquent\EntryRepository'
        );
    }

}
