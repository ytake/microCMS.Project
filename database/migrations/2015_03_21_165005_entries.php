<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Entries
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Entries extends Migration
{

    /** @var string  */
    protected $table = "entries";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function ($table) {
            /** @var \Illuminate\Database\Schema\Blueprint $table */
            $table->increments('entry_id');
            $table->char('slug');
            $table->longText('body');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default(
                DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP')
            );
            $table->engine = "INNODB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
