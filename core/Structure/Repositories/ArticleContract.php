<?php
namespace microCms\Repositories;

/**
 * Interface ArticleContract
 * @package microCms\Repositories
 */
interface ArticleContract
{

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function all();

}
