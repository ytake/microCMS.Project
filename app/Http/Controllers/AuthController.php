<?php
namespace MicroApp\Http\Controllers;

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
     * @Get("/login", as="auth.login")
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('managed.auth.login');
    }

    /**
     * login
     * uri: managed/callback
     * @Get("/callback", as="auth.callback")
     * @return \Illuminate\View\View
     */
    public function callback()
    {

    }

    /**
     * @Get("/logout", as="auth.logout")
     */
    public function logout()
    {

    }
}
