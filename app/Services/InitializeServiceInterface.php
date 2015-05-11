<?php
namespace MicroApp\Services;

/**
 * Class InitializeService
 * @package MicroApp\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface InitializeServiceInterface
{

    /**
     * @return array
     */
    public function getEnvironments();

    /**
     * @param array $params
     * @param bool $production
     * @return mixed
     */
    public function generateEnvironmentFile(array $params = [], $production = false);


}
