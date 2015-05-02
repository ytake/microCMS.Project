<?php
namespace MicroApp\Http\Controllers\Managed;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class AuthController
 * @package MicroApp\Http\Controllers\Managed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AuthController extends BaseController
{

    /**
     * login
     * uri: managed/login
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('managed.auth.login');
    }

    /**
     * login
     * uri: managed/callback
     * @return \Illuminate\View\View
     */
    public function callback()
    {

    }

    public function logout()
    {

    }
}
