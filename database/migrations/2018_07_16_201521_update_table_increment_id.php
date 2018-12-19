<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableIncrementId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users_performances')) {
            Schema::table('users_performances', function (Blueprint $table) {
                $table->increments('id');
            });
        }
        if(Schema::hasTable('users_rehearsals')) {
            Schema::table('users_rehearsals', function (Blueprint $table) {
                $table->increments('id');
            });
        }
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
