<?php
namespace microCms\Structure\Repositories;

/**
 * Interface UserContract
 * @package microCms\Structure\Repositories
 */
interface UserContract
{

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

}
