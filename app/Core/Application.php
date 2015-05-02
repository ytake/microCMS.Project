<?php
namespace MicroApp\Core;

/**
 * for microCms
 * Class Application
 * @package MicroApp\Core
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Application extends \Laravel\Lumen\Application
{

    /**
     * @param null $basePath
     */
    public function __construct($basePath = null)
    {
        parent::__construct($basePath);
    }

    /**
     * The available container bindings and their respective load methods.
     *
     * @var array
     */
    public $availableBindings = [
        'auth' => 'registerAuthBindings',
        'Illuminate\Contracts\Auth\Guard' => 'registerAuthBindings',
        'auth.password' => 'registerAuthBindings',
        'Illuminate\Contracts\Auth\PasswordBroker' => 'registerAuthBindings',
        'Illuminate\Contracts\Bus\Dispatcher' => 'registerBusBindings',
        'cache' => 'registerCacheBindings',
        'Illuminate\Contracts\Cache\Factory' => 'registerCacheBindings',
        'Illuminate\Contracts\Cache\Repository' => 'registerCacheBindings',
        'config' => 'registerConfigBindings',
        'composer' => 'registerComposerBindings',
        'cookie' => 'registerCookieBindings',
        'Illuminate\Contracts\Cookie\Factory' => 'registerCookieBindings',
        'Illuminate\Contracts\Cookie\QueueingFactory' => 'registerCookieBindings',
        'db' => 'registerDatabaseBindings',
        'encrypter' => 'registerEncrypterBindings',
        'Illuminate\Contracts\Encryption\Encrypter' => 'registerEncrypterBindings',
        'events' => 'registerEventBindings',
        'Illuminate\Contracts\Events\Dispatcher' => 'registerEventBindings',
        'Illuminate\Contracts\Debug\ExceptionHandler' => 'registerErrorBindings',
        'files' => 'registerFilesBindings',
        'filesystem' => 'registerFilesBindings',
        'Illuminate\Contracts\Filesystem\Factory' => 'registerFilesBindings',
        'hash' => 'registerHashBindings',
        'Illuminate\Contracts\Hashing\Hasher' => 'registerHashBindings',
        'Psr\Log\LoggerInterface' => 'registerLogBindings',
        'mailer' => 'registerMailBindings',
        'Illuminate\Contracts\Mail\Mailer' => 'registerMailBindings',
        'request' => 'registerRequestBindings',
        'Illuminate\Http\Request' => 'registerRequestBindings',
        'session' => 'registerSessionBindings',
        'session.store' => 'registerSessionBindings',
        'Illuminate\Session\SessionManager' => 'registerSessionBindings',
        'translator' => 'registerTranslationBindings',
        'url' => 'registerUrlGeneratorBindings',
        'validator' => 'registerValidatorBindings',
        'view' => 'registerViewBindings',
        'Illuminate\Contracts\View\Factory' => 'registerViewBindings',
        'path.storage' => 'registerStoragePathBindings'
    ];

    /**
     * @return bool
     */
    public function routesAreCached()
    {
        return false;
    }

    /**
     * Register container bindings for the application.
     * @return void
     */
    protected function registerStoragePathBindings()
    {
        $this->singleton('path.storage', function () {
            return storage_path();
        });
    }
}
