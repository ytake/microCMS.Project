<?php
namespace MicroApp\Services;

use Illuminate\Support\Str;
use MicroApp\Repositories\EnvironmentRepositoryInterface;

/**
 * Class InitializeService
 * @package MicroApp\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class InitializeService implements InitializeServiceInterface
{

    /** @var EnvironmentRepositoryInterface  */
    protected $env;

    const DEFAULT_KEY = 'SomeRandomKey!!!';

    /**
     * @param EnvironmentRepositoryInterface $env
     */
    public function __construct(EnvironmentRepositoryInterface $env)
    {
        $this->env = $env;
    }

    /**
     * @return array
     */
    public function getEnvironments()
    {
        return $this->env->parseEnvironments();
    }

    /**
     * @param array $params
     * @param bool $production
     * @return int
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function generateEnvironmentFile(array $params = [], $production = false)
    {
        if ($this->env->copyEnvironmentFile()) {
            $content = $this->env->getEnvContent($this->env->environmentFile());
            app()->configure('app');
            if (config('app.key') === self::DEFAULT_KEY) {
                $content = str_replace(self::DEFAULT_KEY, $this->generateKey(), $content);
            }
            if (count($params)) {
                foreach ($params as $key => $value) {
                    if(preg_match("/{$key}=(\w+)/", $content)) {
                        $content = preg_replace("/{$key}=(\w+)/", "{$key}={$value}", $content);
                    } else {
                        $content .= "\n{$key}={$value}";
                    }
                }
            }
            if ($production) {
                $content = str_replace("APP_ENV=local", "APP_ENV=production", $content);
                $content = str_replace("APP_DEBUG=true", "APP_DEBUG=false", $content);
            }
            return $this->env->setPutEnvFileContent($content);
        }
        throw new \Illuminate\Contracts\Filesystem\FileNotFoundException(
            "Not Found: " . $this->env->environmentFile()
        );
    }

    /**
     * generate application key
     * @return string
     */
    protected function generateKey()
    {
        return Str::random(32);
    }

}
