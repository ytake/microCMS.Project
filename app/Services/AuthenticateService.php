<?php
namespace MicroApp\Services;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;
use MicroApp\Repositories\UserRepositoryInterface;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;

/**
 * Class AuthenticateService
 * @package MicroApp\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AuthenticateService
{

    /** @var Guard  */
    protected $auth;

    /** @var SocialiteFactory  */
    protected $socialite;

    /** @var mixed  */
    protected $driver;

    /**
     * @param SocialiteFactory $socialite
     * @param Guard $auth
     * @param UserRepositoryInterface $user
     * @param null $driver
     */
    public function __construct(
        SocialiteFactory $socialite,
        Guard $auth,
        UserRepositoryInterface $user,
        $driver = null
    ) {
        $this->socialite = $socialite;
        $this->auth = $auth;
        $this->user = $user;
        $this->driver =  (!is_null($driver)) ? $driver : env('CMS_SOCIAL_DRIVER');
    }

    /**
     * @return \Laravel\Socialite\Contracts\Provider
     */
    public function getProvider()
    {
        return $this->socialite->driver($this->driver);
    }

    /**
     * @return bool|\Illuminate\Support\Collection|null|static
     */
    public function socialiteAttempt()
    {
        try {
            $socialiteUser = $this->socialite->driver($this->driver)->user();
            return $this->user->getUser([
                'id' => $socialiteUser->getId(),
                'name' => $socialiteUser->getNickname(),
                'email' => $socialiteUser->getEmail(),
                'token' => $socialiteUser->token
            ]);
        } catch(\Exception $e) {
            return false;
        }
    }

    /**
     * @param Authenticatable $user
     */
    public function login(Authenticatable $user)
    {
        $this->auth->login($user);
    }


}
