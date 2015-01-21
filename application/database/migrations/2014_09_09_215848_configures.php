<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Configures
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Configures extends Migration
{


    protected $table = "configures";

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function($table) {
                $table->engine = 'InnoDB';
                $table->increments('configure_id');
                $table->string('configure_title')->unique();
                $table->string('configure_value');
                $table->timestamp('created_at');
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
