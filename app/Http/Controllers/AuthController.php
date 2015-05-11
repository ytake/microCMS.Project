<?php
namespace MicroApp\Http\Controllers;

use MicroApp\Services\AuthenticateService;
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
     * @Post("/auth", as="auth.provide")
     * @param AuthenticateService $auth
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function authProvider(AuthenticateService $auth)
    {
        return $auth->getProvider()->redirect();
    }

    /**
     * login
     * uri: managed/callback
     * @Get("/callback", as="auth.callback")
     * @param AuthenticateService $auth
     * @return \Illuminate\View\View
     */
    public function callback(AuthenticateService $auth)
    {
        $result = $auth->socialiteAttempt();
        if($result) {
            $auth->login($result);
        }
        return redirect()->route('managed.top');
    }

    /**
     * @Get("/logout", as="auth.logout")
     */
    public function logout()
    {

    }
}
