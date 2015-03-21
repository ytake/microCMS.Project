<?php
namespace App\Providers;

use Dropbox\Client;
use League\Flysystem\Filesystem;
use League\Flysystem\Dropbox\DropboxAdapter;
use Illuminate\Support\ServiceProvider;

/**
 * Class FilesystemServiceProvider
 * @package App\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FilesystemServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->app['filesystem']->extend('dropbox', function ($app) {
            $config = $app['config']['filesystems.disks.dropbox'];
            return new Filesystem(
                new DropboxAdapter(
                    new Client($config['token'], $config['appName'])
                )
            );
        });
    }
}
