<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablesAddDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('insertion')->nullable()->change();
                $table->dateTime('date_of_birth')->nullable()->change();
                $table->string('gender')->nullable()->change();
                $table->string('email2')->nullable()->change();
                $table->string('function')->nullable()->change();
                $table->integer('board_member')->nullable()->change();
                $table->integer('first_instrument')->nullable()->change();
                $table->integer('booking_manager')->nullable()->change();
                $table->string('street')->nullable()->change();
                $table->string('zip')->nullable()->change();
                $table->string('city')->nullable()->change();
                $table->string('tel')->nullable()->change();
                $table->string('tel_business')->nullable()->change();
                $table->string('tel_mobile')->nullable()->change();
                $table->string('username')->nullable()->change();
                $table->string('password')->nullable()->change();
                $table->integer('access_level')->nullable()->change();
                $table->dateTime('last_login')->nullable()->change();
                $table->string('status')->nullable()->change();
                $table->dateTime('start_date')->nullable()->change();
                $table->dateTime('end_date')->nullable()->change();
                $table->string('profession')->nullable()->change();
                $table->string('own_transport')->nullable()->change();
                $table->longText('experience')->nullable()->change();
                $table->longText('motivation')->nullable()->change();
                $table->string('hash')->nullable()->change();
                $table->integer('honorary_board')->nullable()->change();
            });
        }
        if(Schema::hasTable('performances')) {
            Schema::table('performances', function (Blueprint $table) {
                $table->dateTime('date')->nullable()->change();
                $table->string('time')->nullable()->change();
                $table->string('place')->nullable()->change();
                $table->string('occasion')->nullable()->change();
                $table->string('type')->nullable()->change();
                $table->string('active')->nullable()->change();
                $table->string('status')->nullable()->change();
                $table->longText('cancellation_reason')->nullable()->change();
                $table->longText('info')->nullable()->change();
                $table->dateTime('deadline')->nullable()->change();
                $table->string('paid')->nullable()->change();
                $table->dateTime('status_confirmed')->nullable()->change();
                $table->dateTime('status_canceled')->nullable()->change();
                $table->dateTime('status_pending')->nullable()->change();
            });
        }
        if(Schema::hasTable('rehearsals')) {
            Schema::table('rehearsals', function (Blueprint $table) {
                $table->dateTime('date')->nullable()->change();
                $table->string('time')->nullable()->change();
                $table->string('status')->nullable()->change();
                $table->longText('particularities')->nullable()->change();
            });
        }
        if(Schema::hasTable('users_performances')) {
            Schema::table('users_performances', function (Blueprint $table) {
                $table->string('status')->nullable()->change();
            });
        }
        if(Schema::hasTable('users_rehearsals')) {
            Schema::table('users_rehearsals', function (Blueprint $table) {
                $table->string('status')->nullable()->change();
                $table->dateTime('mod_date')->nullable()->change();
            });
        }
        if(Schema::hasTable('mails')) {
            Schema::table('mails', function (Blueprint $table) {
                $table->integer('performance_id')->nullable()->change();
                $table->string('group')->nullable()->change();
                $table->longText('message')->nullable()->change();
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
