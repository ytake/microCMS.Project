<?php
namespace App\Repositories;

/**
 * Interface EntryRepositoryInterface
 * @package App\Repositories
 */
interface EntryRepositoryInterface
{

    /**
     * 記事取得
     * @param int $offset
     * @return mixed
     */
    public function getEntries($offset = 10);

    /**
     * 記事取得
     * @param $entryId
     * @return mixed
     */
    public function getEntry($entryId);

    /**
     * @param array $params
     * @return mixed
     */
    public function addEntry(array $params);

    /**
     * @param $entryId
     * @param array $params
     * @return mixed
     */
    public function updateEntry($entryId, array $params);

    /**
     * @param $entryId
     * @return mixed
     */
    public function deleteEntry($entryId);

}
