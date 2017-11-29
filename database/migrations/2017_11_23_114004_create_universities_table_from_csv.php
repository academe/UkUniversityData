<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTableFromCsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function($table){
            
            $table->integer ('UKPRN')->unsigned()->unique();
            $table->string ('PROVIDER_NAME');
            $table->string ('VIEW_NAME');
            $table->string ('SORT_NAME');
            $table->string ('ALIAS');
            $table->string ('FLAT_NAME_NUMBER');
            $table->string ('BUILDING_NAME_NUMBER');
            $table->string ('LOCALITY');
            $table->string ('STREET_NAME');
            $table->string ('TOWN');
            $table->string ('POSTCODE');
            $table->string ('WEBSITE_URL');

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
