<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablesAddDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('mails')) {
            if(!Schema::hasColumn('mails', 'created_at') {
                Schema::table('mails', function (Blueprint $table) {
                    $table->timestamps();
                })
            });
        }
        if(Schema::hasTable('old_users')) {
            if (!Schema::hasColumn('old_users', 'created_at'){
            Schema::table('old_users', function (Blueprint $table) {
                    $table->timestamps();
                })
            });
        }


        if(Schema::hasTable('performances')) {
            if(!Schema::hasColumn('performances', 'created_at') {
                Schema::table('performances', function (Blueprint $table) {
                    $table->timestamps();
                })
            });
        }
        if(Schema::hasTable('rehearsals')) {
            if(!Schema::hasColumn('rehearsals', 'created_at') {
                Schema::table('rehearsals', function (Blueprint $table) {
                    $table->timestamps();
                })
            });
        }
        if(Schema::hasTable('users')) {
            if(!Schema::hasColumn('users', 'created_at') {
                Schema::table('users', function (Blueprint $table) {
                    $table->timestamps();
                })
            });
        }
        if(Schema::hasTable('users_performances')) {
            if(!Schema::hasColumn('users_performances', 'created_at') {
                Schema::table('users_performances', function (Blueprint $table) {
                    $table->timestamps();
                })
            });
        }
        if(Schema::hasTable('users_rehearsals')) {
            if(!Schema::hasColumn('users_rehearsals', 'created_at') {
                Schema::table('users_rehearsals', function (Blueprint $table) {
                    $table->timestamps();
                })
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
