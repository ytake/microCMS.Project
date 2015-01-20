<?php
namespace microCms\Structure\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package microCms\Structure\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EventServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function register()
    {
        /** @var \Illuminate\Events\Dispatcher $event */
        $event = $this->app['events'];
        $event->listen('request.validate', "microCms\Structure\Dispatcher\ValidateDispatcher");
    }

}
