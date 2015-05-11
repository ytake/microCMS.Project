<?php
namespace MicroApp\Repositories\File;

use Illuminate\Filesystem\Filesystem;
use MicroApp\Repositories\EnvironmentRepositoryInterface;

/**
 * Class EnvironmentRepository
 * @package MicroApp\Repositories\File
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EnvironmentRepository implements EnvironmentRepositoryInterface
{

    /** @var Filesystem */
    protected $file;

    /** @var array  */
    protected $excludeKeys = [
        'APP_ENV',
        'APP_DEBUG',
        'APP_KEY'
    ];

    /**
     * @param Filesystem $file
     */
    public function __construct(Filesystem $file)
    {
        $this->file = $file;
    }

    /**
     * @return array
     */
    public function parseEnvironments()
    {
        $returnChangeableEnvironment = [];
        $autodetect = ini_get('auto_detect_line_endings');
        ini_set('auto_detect_line_endings', '1');
        $lines = file($this->environmentFile(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        ini_set('auto_detect_line_endings', $autodetect);

        foreach ($lines as $line) {
            // Disregard comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line);
            if(!in_array($key, $this->excludeKeys)) {
                $returnChangeableEnvironment[$key] = $value;
            }
        }
        return $returnChangeableEnvironment;
    }

    /**
     * @return bool
     */
    public function copyEnvironmentFile()
    {
        if (!$this->file->exists(base_path() . '/.env')) {
            return $this->file->copy(
                base_path() . '/.env.example',
                base_path() . '/.env'
            );
        }
        return true;
    }

    /**
     * @return string
     */
    public function environmentFile()
    {
        if (!$this->file->exists(base_path() . '/.env')) {
            return base_path() . '/.env.example';
        }
        return base_path() . '/.env';
    }

    /**
     * @param $path
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getEnvContent($path)
    {
        return $this->file->get($path);
    }

    /**
     * @param $content
     * @return int
     */
    public function setPutEnvFileContent($content)
    {
        return $this->file->put($this->environmentFile(), $content);
    }

}
