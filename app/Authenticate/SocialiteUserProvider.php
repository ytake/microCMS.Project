<?php
namespace MicroApp\Authenticate;

use Laravel\Socialite\Contracts\Factory;
use Illuminate\Contracts\Auth\UserProvider;
use MicroApp\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

/**
 * Class SocialiteUserProvider
 * @package App\Authenticate
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SocialiteUserProvider implements UserProvider
{

    /** @var UserRepositoryInterface  */
    protected $user;

    /** @var Factory  */
    protected $socialite;

    /**
     * @param Factory $socialite
     * @param UserRepositoryInterface $user
     */
    public function __construct(Factory $socialite, UserRepositoryInterface $user)
    {
        $this->user = $user;
        $this->socialite = $socialite;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return $this->user->getUserFromId($identifier);
    }

    /**
     * Retrieve a user by by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
       return $this->user->getUserFromToken($identifier, $token);
    }

    /**
     * @param UserContract $user
     * @param string $token
     */
    public function updateRememberToken(UserContract $user, $token)
    {
        $user->setRememberToken($token);

        $user->save();
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if($credentials['nickname'] === env('CMS_SOCIAL_ACCOUNT')) {
            return $this->getGenericUser($credentials);
        }
        return null;
    }

    /**
     * @param $user
     * @return SocialiteUser
     */
    protected function getGenericUser($user)
    {
        if ($user !== null) {
            return new SocialiteUser((array)$user);
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param UserContract $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        return true;
    }

}
