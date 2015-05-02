<?php
namespace MicroApp\Services;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

/**
 * Class InitializeService
 * @package MicroApp\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class InitializeService
{

    /** @var Filesystem */
    protected $file;

    const DEFAULT_KEY = 'SomeRandomKey!!!';

    /**
     * @param Filesystem $file
     */
    public function __construct(Filesystem $file)
    {
        $this->file = $file;
    }

    /**
     * @param array $addParams
     * @param bool $production
     * @return int
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function generateEnvironmentFile(array $addParams = [], $production = false)
    {
        app()->configure('app');
        if ($this->copyEnvironmentFile()) {
            $content = $this->file->get($this->environmentFile());
            if (config('app.key') === self::DEFAULT_KEY) {
                $content = str_replace(self::DEFAULT_KEY, $this->generateKey(), $content);
            }
            if (count($addParams)) {
                foreach ($addParams as $key => $value) {
                    $content .= "\n{$key}={$value}";
                }
            }
            if ($production) {
                $content = str_replace("APP_ENV=local", "APP_ENV=production", $content);
                $content = str_replace("APP_DEBUG=true", "APP_DEBUG=false", $content);
            }
            return $this->file->put($this->environmentFile(), $content);
        }
        throw new \Illuminate\Contracts\Filesystem\FileNotFoundException(
            "Not Found: " . $this->environmentFile()
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

    /**
     * @return bool
     */
    public function copyEnvironmentFile()
    {
        if (!$this->file->exists($this->environmentFile())) {
            return $this->file->copy(
                base_path() . '/.env.example',
                $this->environmentFile()
            );
        }
        return true;
    }

    /**
     * @return string
     */
    protected function environmentFile()
    {
        return base_path() . '/.env';
    }

}
