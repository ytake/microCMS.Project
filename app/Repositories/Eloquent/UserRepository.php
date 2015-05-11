<?php
namespace MicroApp\Repositories\Eloquent;

use MicroApp\Repositories\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package MicroApp\Repositories\Eloquent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class UserRepository extends User implements UserRepositoryInterface
{

    /**
     * @param array $params
     * @return static
     */
    public function getUser(array $params)
    {
        return User::firstOrCreate($params);
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function getUserFromId($id)
    {
        return User::find($id);
    }

    public function getUserFromToken($id, $token)
    {
        return User::where($this->getKeyName(), $id)
            ->where($this->getRememberTokenName(), $token)
            ->find();
    }

}
