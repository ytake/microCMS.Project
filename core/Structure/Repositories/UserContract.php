<?php
namespace microCms\Repositories;

/**
 * Interface UserContract
 * @package microCms\Repositories
 */
interface UserContract
{

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

}
