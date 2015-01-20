<?php
namespace microCms\Structure\Repositories;

/**
 * Interface ArticleContract
 * @package microCms\Structure\Repositories
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
