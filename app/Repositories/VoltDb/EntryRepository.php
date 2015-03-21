<?php
namespace App\Repositories\VoltDb;

use App\Repositories\EntryRepositoryInterface;

/**
 * Class EntryRepository
 * @package App\Repositories\Eloquent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryRepository implements EntryRepositoryInterface
{

    /**
     * 記事取得
     * @param int $offset
     * @return mixed
     */
    public function getEntries($offset = 10)
    {
        return \DB::connection('voltdb')->procedure("OffsetEntries", []);
    }

    /**
     * 記事取得
     * @param $entryId
     * @return mixed
     */
    public function getEntry($entryId)
    {
        return \DB::connection('voltdb')->procedure("FindEntry", [$entryId]);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function addEntry(array $params)
    {
        return \DB::connection('voltdb')->procedure("AddEntry", $params);
    }

    /**
     * @param $entryId
     * @param array $params
     * @return mixed
     */
    public function updateEntry($entryId, array $params)
    {
        return \DB::connection('voltdb')->procedure("UpdateEntry", [$entryId, $params]);
    }

    /**
     * @param $entryId
     * @return mixed
     */
    public function deleteEntry($entryId)
    {
        return \DB::connection('voltdb')->procedure("DeleteEntry", [$entryId]);
    }

}

