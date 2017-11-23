<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTableFromCsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('courses', function ($table) {
            
            $table->integer ('PUBUKPRN')->unsigned();
            $table->integer ('UKPRN')->unsigned();
            $table->string ('ASSURL');
            $table->string ('ASSURLW');
            $table->string ('CRSEURL');
            $table->string ('CRSEURLW');
            $table->enum ('DISTANCE', ['2', '1', '0']);
            $table->string ('EMPLOYURL');
            $table->string ('EMPLOYURLW');
            $table->enum ('FOUNDATION', ['0', '1', '2']);
            $table->enum ('HONOURS', ['0', '1']);
            // $table->enum ('JACS', );
            $table->string ('KISCOURSEID');
            // $table->enum ('KISMODE', ['1', '2']);
            // $table->enum ('LDCS', );
            $table->enum ('LOCCHNGE', ['0', '1']);
            $table->string ('LTURL');
            $table->string ('LTURLW');
            $table->enum ('NHS', ['0', '1']);
            $table->enum ('NUMSTAGE', ['1', '2', '3', '4', '5', '6', '7']);
            $table->enum ('SANDWHICH', ['0', '1', '2']);
            $table->string ('SUPPORTURL');
            $table->string ('SUPPORTURLW');
            $table->string ('TITLE');
            $table->string ('TITLEW');
            $table->string ('UCASPROGID');
            $table->integer ('UKPRNAPPLY');
            $table->enum ('YEARABROAD', ['0', '1', '2']);
            $table->integer ('KISAIM');


            $table->primary ('KISCOURSEID');
            $table->foreign('UKPRN')->references('UKPRN')->on('universities');
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
