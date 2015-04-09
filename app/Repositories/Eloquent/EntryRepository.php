<?php
namespace App\Repositories\Eloquent;

use App\Repositories\EntryRepositoryInterface;

/**
 * Class EntryRepository
 * @package App\Repositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryRepository extends Entry implements EntryRepositoryInterface
{

    public function __construct()
    {

    }

    /**
     * 記事取得
     * @param int $offset
     * @return mixed
     */
    public function getEntries($offset = 10)
    {
        // TODO: Implement getEntries() method.
    }

    /**
     * 記事取得
     * @param $entryId
     * @return mixed
     */
    public function getEntry($entryId)
    {
        // TODO: Implement getEntry() method.
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function addEntry(array $params)
    {
        // TODO: Implement addEntry() method.
    }

    /**
     * @param $entryId
     * @param array $params
     * @return mixed
     */
    public function updateEntry($entryId, array $params)
    {
        // TODO: Implement updateEntry() method.
    }

    /**
     * @param $entryId
     * @return mixed
     */
    public function deleteEntry($entryId)
    {
        // TODO: Implement deleteEntry() method.
    }

}
