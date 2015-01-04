<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Samples
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Samples extends Migration
{

    protected $table = "samples";

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function($table) {
                $table->engine = 'InnoDB';
                $table->increments('sample_id');
                $table->string('sample_name')->unique();
                $table->timestamp('created_at');
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
                $table->index(['sample_id', 'sample_name'], 'SECTION_INDEX');
            }
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        \Schema::drop($this->table);
    }


}
