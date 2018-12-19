<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablesRename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('leden')) {
            Schema::rename('leden', 'users');
            Schema::table('users', function (Blueprint $table) {
                $table->renameColumn('Lid_ID', 'id');
                $table->renameColumn('Lid_Achternaam', 'name');
                $table->renameColumn('Lid_Tussenvoegsel', 'insertion');
                $table->renameColumn('Lid_Voornaam', 'firstname');
                $table->renameColumn('Lid_GebDat', 'date_of_birth');
                $table->renameColumn('Lid_Geslacht', 'gender');
                $table->renameColumn('Lid_Email', 'email');
                $table->renameColumn('Lid_Email2', 'email2');
                $table->renameColumn('Lid_Functie', 'function');
                $table->renameColumn('lid_Bestuur', 'board_member');
                $table->renameColumn('Lid_EersteInstrument', 'first_instrument');
                $table->renameColumn('Lid_Boekingsmanager', 'booking_manager');
                $table->renameColumn('Lid_Straat', 'street');
                $table->renameColumn('Lid_Postcode', 'zip');
                $table->renameColumn('Lid_Woonplaats', 'city');
                $table->renameColumn('Lid_Telefoon', 'tel');
                $table->renameColumn('Lid_TelefoonWerk', 'tel_business');
                $table->renameColumn('Lid_Mobiel', 'tel_mobile');
                $table->renameColumn('Lid_Login', 'username');
                $table->renameColumn('Lid_Pass', 'password');
                $table->renameColumn('Lid_AccLevel', 'access_level');
                $table->renameColumn('Lid_LastLogin', 'last_login');
                $table->renameColumn('Lid_Status', 'status');
                $table->renameColumn('Lid_Sinds', 'start_date');
                $table->renameColumn('Lid_Tot', 'end_date');
                $table->renameColumn('Lid_Beroep', 'profession');
                $table->renameColumn('Lid_EigenVervoer', 'own_transport');
                $table->renameColumn('Lid_Ervaring', 'experience');
                $table->renameColumn('Lid_Motivatie', 'motivation');
                $table->renameColumn('Lid_Hash', 'hash');
                $table->renameColumn('Lid_Erebestuur', 'honorary_board');
                $table->renameColumn('Lid_DebNr', 'deb_number');
                $table->renameColumn('Lid_BankNr', 'account_number');
            });
        }
        if(Schema::hasTable('agenda')) {
            Schema::rename('agenda', 'performances');
            Schema::table('performances', function (Blueprint $table) {
                $table->renameColumn('Agn_ID', 'id');
                $table->renameColumn('Agn_Datum', 'date');
                $table->renameColumn('Agn_Tijd', 'time');
                $table->renameColumn('Agn_Plaats', 'place');
                $table->renameColumn('Agn_Wat', 'occasion');
                $table->renameColumn('Agn_Soort', 'type');
                $table->renameColumn('Agn_Active', 'active');
                $table->renameColumn('Agn_Status', 'status');
                $table->renameColumn('Agn_RedenAnnul', 'cancellation_reason');
                $table->renameColumn('Agn_MeerInfo', 'info');
                $table->renameColumn('Agn_Deadline', 'deadline');
                $table->renameColumn('Agn_Betaald', 'paid');
                $table->renameColumn('Agn_DatumToegevoegd', 'created_at');
                $table->renameColumn('Agn_StatusBevestigd', 'status_confirmed');
                $table->renameColumn('Agn_StatusGeannuleerd', 'status_canceled');
                $table->renameColumn('Agn_StatusInBehandeling', 'status_pending');
            });
        }
        if(Schema::hasTable('repetities')) {
            Schema::rename('repetities', 'rehearsals');
            Schema::table('rehearsals', function (Blueprint $table) {
                $table->renameColumn('Rep_ID', 'id');
                $table->renameColumn('Rep_Datum', 'date');
                $table->renameColumn('REP_Tijd', 'time');
                $table->renameColumn('Rep_Status', 'status');
                $table->renameColumn('Rep_Bijzonderheden', 'particularities');
            });
        }
        if(Schema::hasTable('leden_oud')) {
            Schema::rename('leden_oud', 'old_users');
            Schema::table('old_users', function (Blueprint $table) {
                $table->renameColumn('Lid_ID', 'id');
                $table->renameColumn('Lid_Achternaam', 'name');
                $table->renameColumn('Lid_Voornaam', 'firstname');
                $table->renameColumn('Lid_GebDat', 'date_of_birth');
                $table->renameColumn('Lid_Email', 'email');
                $table->renameColumn('Lid_Email2', 'email2');
                $table->renameColumn('Lid_Functie', 'function');
                $table->renameColumn('Lid_Woonplaats', 'residence');
                $table->renameColumn('Lid_Login', 'username');
                $table->renameColumn('Lid_Pass', 'password');
                $table->renameColumn('Lid_AccLevel', 'access_level');
                $table->renameColumn('Lid_LastLogin', 'last_login');
                $table->renameColumn('Lid_Actief', 'active');
            });
        }
        if(Schema::hasTable('leden_optredens')) {
            Schema::rename('leden_optredens', 'users_performances');
            Schema::table('users_performances', function (Blueprint $table) {
                $table->renameColumn('Agn_ID', 'performance_id');
                $table->renameColumn('Lid_ID', 'user_id');
                $table->renameColumn('Status', 'status');
            });
        }
        if(Schema::hasTable('leden_repetities')) {
            Schema::rename('leden_repetities', 'users_rehearsals');
            Schema::table('users_rehearsals', function (Blueprint $table) {
                $table->renameColumn('Rep_ID', 'rehearsal_id');
                $table->renameColumn('Lid_ID', 'user_id');
                $table->renameColumn('Status', 'status');
                $table->renameColumn('ModDate', 'mod_date');
            });
        }
        if(Schema::hasTable('mail')) {
            Schema::rename('mail', 'mails');
            Schema::table('mails', function (Blueprint $table) {
                $table->renameColumn('Mail_ID', 'id');
                $table->renameColumn('Agn_ID', 'performance_id');
                $table->renameColumn('Mail_Datum', 'date');
                $table->renameColumn('Mail_Groep', 'group');
                $table->renameColumn('Mail_Body', 'message');
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
        Schema::rename('users', 'leden');
        Schema::rename('performances', 'agenda');
        Schema::rename('rehearsals', 'repetities');
        Schema::rename('old_users', 'leden_oud');
        Schema::rename('users_performances', 'leden_optredens');
        Schema::rename('users_rehearsals', 'leden_repetities');
    }
}
