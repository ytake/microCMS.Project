<?php
namespace MicroApp\Repositories;

/**
 * Interface UserRepositoryInterface
 * @package MicroApp\Repositories
 */
interface UserRepositoryInterface
{

    /**
     * @param array $params
     * @return mixed
     */
    public function getUser(array $params);

    /**
     * @param $id
     * @return mixed
     */
    public function getUserFromId($id);

    /**
     * @param $id
     * @param $token
     * @return mixed
     */
    public function getUserFromToken($id, $token);
}
