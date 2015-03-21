<?php

return [

    /**
     * ブログなどのエントリの保存方法について選択することができます
     * webサーバを複数台で利用する場合は、storage, databaseのどちらかを選択してください
     * database, local FileSystem, storage StorageFileSystem
     *
     * storageには"s3", "rackspace", "dropbox"が利用できます
     * 対応databaseはmysql, postgresql, sqlite, sqlsrv, voltdbが利用できます
     */
    'entry' => 'database',

    'content_title' => 'micro',

];
