<?php
namespace microCms\Structure\Middleware;

/**
 * Class AbstractMiddleware
 * @package microCms\Structure\Middleware
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractMiddleware
{

    /**
     * @return void
     */
    abstract public function filter();

}
