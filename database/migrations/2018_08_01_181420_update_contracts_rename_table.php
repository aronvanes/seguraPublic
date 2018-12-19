<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContractsRenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('contracten')) {
            Schema::rename('contracten', 'contracts');
            Schema::table('contracts', function (Blueprint $table) {
                $table->renameColumn('Con_ID', 'id');
                $table->renameColumn('Agn_ID', 'performance_id');
                $table->renameColumn('Con_Naam', 'name');
                $table->renameColumn('Con_Contact', 'contact');
                $table->renameColumn('Con_Telefoon', 'tel');
                $table->renameColumn('Con_adres', 'address');
                $table->renameColumn('Con_Postcode', 'zip');
                $table->renameColumn('Con_Plaats', 'place');
                $table->renameColumn('Con_Wat', 'details');
                $table->renameColumn('Con_Email', 'email');
                $table->renameColumn('Con_TariefOptreden', 'rate_performance');
                $table->renameColumn('Con_TariefReiskosten', 'travel_expenses');
                $table->renameColumn('Con_TariefKostuums', 'rate_costumes');
                $table->renameColumn('Con_TariefAct', 'rate_act');
                $table->renameColumn('Con_Overige', 'other');

                $table->timestamps();
            });
            Schema::table('contracts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('performance_id')->nullable()->change();
                $table->string('name')->nullable()->change();
                $table->string('contact')->nullable()->change();
                $table->string('tel')->nullable()->change();
                $table->string('address')->nullable()->change();
                $table->string('zip')->nullable()->change();
                $table->string('place')->nullable()->change();
                $table->longText('details')->nullable()->change();
                $table->string('email')->nullable()->change();
                $table->decimal('rate_performance')->nullable()->change();
                $table->decimal('travel_expenses')->nullable()->change();
                $table->decimal('rate_costumes')->nullable()->change();
                $table->decimal('rate_act')->nullable()->change();
                $table->longText('other')->nullable()->change();
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
        if(Schema::hasTable('contracts')) {
            Schema::rename('contracts', 'contracten');
        }
    }
}
