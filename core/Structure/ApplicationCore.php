<?php
namespace microCms;

use Illuminate\Config\FileLoader;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;

/**
 * Class ApplicationCore
 * @package microCms
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ApplicationCore extends Application
{


    /**
     * {@inheritdoc}
     */
    public static function getBootstrapFile()
    {
        return __DIR__.'/initialize.php';
    }


    /**
     * Get the configuration loader instance.
     *
     * @return \Illuminate\Config\LoaderInterface
     */
    public function getConfigLoader()
    {
        $fileLoader = new FileLoader(new Filesystem, $this['path.system'] . '/config');
        $fileLoader->addNamespace('cms', app_path() . '/config');
        $fileLoader->load($this['env'], 'cms', 'cms');
        return $fileLoader;
    }

}
