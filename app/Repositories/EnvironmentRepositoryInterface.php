<?php
namespace MicroApp\Repositories;

/**
 * Interface EnvironmentRepositoryInterface
 * @package MicroApp\Repositories
 */
interface EnvironmentRepositoryInterface
{

    /**
     * @return array
     */
    public function parseEnvironments();

    /**
     * @return bool
     */
    public function copyEnvironmentFile();

    /**
     * @return mixed
     */
    public function environmentFile();

    /**
     * @param $path
     * @return mixed
     */
    public function getEnvContent($path);

    /**
     * @param $content
     * @return mixed
     */
    public function setPutEnvFileContent($content);
}