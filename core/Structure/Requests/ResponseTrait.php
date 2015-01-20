<?php
namespace microCms\Structure\Requests;

/**
 * Class ResponseTrait
 * @package microCms\Structure\Requests
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
trait ResponseTrait
{

    /**
     * @return mixed
     */
    protected function redirectForm()
    {
        $explode = explode('.', \Route::currentRouteName());
        return str_replace(end($explode), 'form', \Route::currentRouteName());
    }

}
