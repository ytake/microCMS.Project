<?php
namespace microCms\Structure\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ApplicationServiceProvider
 * @package microCms\Structure\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ApplicationServiceProvider extends ServiceProvider
{

    public function register()
    {
        /** @var \Illuminate\View\FileViewFinder $viewFinder */
        $viewFinder = $this->app['view.finder'];
        $viewFinder->addLocation(base_path('core/templates'));
    }

}
