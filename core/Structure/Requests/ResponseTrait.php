<?php
namespace microCms\Requests;

/**
 * Class ResponseTrait
 * @package microCms\Requests
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
