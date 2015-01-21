<?php
namespace microCms\Middleware;

/**
 * Class AbstractMiddleware
 * @package microCms\Middleware
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractMiddleware
{

    /**
     * @return void
     */
    abstract public function filter();

}
