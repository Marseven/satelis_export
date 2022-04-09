<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->string('NUMDIST')->nullable();
            $table->string('NOMDIST')->nullable();
            $table->string('CSALESMAN')->nullable();
            $table->string('LSALESMAN')->nullable();
            $table->string('CUSER')->nullable();
            $table->string('LUSER')->nullable();
            $table->string('CCIVIL')->nullable();
            $table->string('NOM')->nullable();
            $table->string('PRENOM')->nullable();
            $table->string('NUMABO')->nullable();
            $table->string('NUMABONT')->nullable();
            $table->string('DATE')->nullable();
            $table->string('CMOUVMT')->nullable();
            $table->string('MONTANT_TTC')->nullable();
            $table->string('MONTANT_HT')->nullable();
            $table->string('DEVISE')->nullable();
            $table->string('TX_TVA')->nullable();
            $table->string('GROUPE')->nullable();
            $table->string('CSOCIETE')->nullable();
            $table->string('CARTICLE')->nullable();
            $table->string('LARTICLE')->nullable();
            $table->string('DEBABO')->nullable();
            $table->string('FINABO')->nullable();
            $table->string('DUREE')->nullable();
            $table->string('VALIDFULL')->nullable();
            $table->string('NUMCARTE')->nullable();
            $table->string('NUMDECO')->nullable();
            $table->string('NUMSCRATCH')->nullable();
            $table->string('MONTANT_TAXE')->nullable();
            $table->string('IDTRANSACTION_MOBILE')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('imports');
    }
}
