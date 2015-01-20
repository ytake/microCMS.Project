<?php
namespace microCms\Structure\Dispatcher;

/**
 * Class AbstractDispatcher
 * @package microCms\Structure\Dispatcher
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractDispatcher
{

    /**
     * @param array $data
     * @param array $append
     * @return mixed
     */
    abstract public function handle(array $data, array $append);

}
