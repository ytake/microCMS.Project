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
     * Register the core container aliases.
     *
     * @return void
     */
    protected function registerContainerAliases()
    {
        $this->aliases = [
            'Illuminate\Contracts\Foundation\Application' => 'app',
            'Illuminate\Contracts\Auth\Guard' => 'auth',
            'Illuminate\Contracts\Auth\PasswordBroker' => 'auth.password',
            'Illuminate\Contracts\Cache\Factory' => 'cache',
            'Illuminate\Contracts\Cache\Repository' => 'cache.store',
            'Illuminate\Contracts\Cookie\Factory' => 'cookie',
            'Illuminate\Contracts\Cookie\QueueingFactory' => 'cookie',
            'Illuminate\Contracts\Encryption\Encrypter' => 'encrypter',
            'Illuminate\Contracts\Events\Dispatcher' => 'events',
            'Illuminate\Contracts\Filesystem\Factory' => 'filesystem',
            'Illuminate\Contracts\Hashing\Hasher' => 'hash',
            'Illuminate\Contracts\Mail\Mailer' => 'mailer',
            'Illuminate\Contracts\Queue\Queue' => 'queue.connection',
            'request' => 'Illuminate\Http\Request',
            'Illuminate\Session\SessionManager' => 'session',
            'Illuminate\Contracts\View\Factory' => 'view',
        ];
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
        'queue' => 'registerQueueBindings',
        'queue.connection' => 'registerQueueBindings',
        'Illuminate\Contracts\Queue\Queue' => 'registerQueueBindings',
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
    ];

}
