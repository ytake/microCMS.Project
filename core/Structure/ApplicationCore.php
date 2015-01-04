<?php
namespace microCms\Structure;

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

}
