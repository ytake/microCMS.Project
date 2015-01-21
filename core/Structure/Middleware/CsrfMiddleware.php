<?php
namespace microCms\Middleware;

use microCms\Requests\ResponseTrait;

/**
 * Class CsrfMiddleware
 * @package microCms\Middleware
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CsrfMiddleware extends AbstractMiddleware
{

    use ResponseTrait;

    /**
     * @throws \Illuminate\Session\TokenMismatchException
     */
    public function filter()
    {
        if (\Session::token() !== \Input::get('_token')) {
            $current = \Route::currentRouteName();
            $diff = array_diff(\Request::segments(), explode('.', $current));
            return \Redirect::route($this->redirectForm(), $diff);
        }
    }

}
