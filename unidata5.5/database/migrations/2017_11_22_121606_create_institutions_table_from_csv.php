<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTableFromCsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('institutions', function ($table) {
            
            $table->integer ('PUBUKPRN')->unsigned()->unique();
            $table->integer ('UKPRN')->unsigned()->unique();
            $table->string ('COUNTRY');
            $table->string ('PUBUKPRNCOUNTRY');
            $table->string ('TEFOutcome');
            $table->string ('APROutcome');
            $table->string ('SUURL');
            $table->string ('SUURLW');

            $table->primary ('UKPRN');
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
