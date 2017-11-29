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
            $table->string ('ASSURL', 500);
            $table->string ('ASSURLW', 500);
            $table->string ('CRSEURL', 500);
            $table->string ('CRSEURLW', 500);
            $table->enum ('DISTANCE', ['2', '1', '0'])->nullable();
            $table->string ('EMPLOYURL', 500);
            $table->string ('EMPLOYURLW', 500);
            $table->enum ('FOUNDATION', ['0', '1', '2'])->nullable();
            $table->enum ('HONOURS', ['0', '1'])->nullable();
            // $table->enum ('JACS', );
            $table->string ('KISCOURSEID');
            $table->enum ('KISMODE', ['1', '2', '3'])->nullable();
            // $table->enum ('LDCS', );
            $table->enum ('LOCCHNGE', ['0', '1'])->nullable();
            $table->string ('LTURL', 500);
            $table->string ('LTURLW', 500);
            $table->enum ('NHS', ['0', '1'])->nullable();
            $table->enum ('NUMSTAGE', ['1', '2', '3', '4', '5', '6', '7'])->nullable();
            $table->enum ('SANDWHICH', ['0', '1', '2'])->nullable();
            $table->string ('SUPPORTURL', 500);
            $table->string ('SUPPORTURLW', 500);
            $table->string ('TITLE');
            $table->string ('TITLEW');
            $table->string ('UCASPROGID')->nullable();
            $table->integer ('UKPRNAPPLY')->nullable();
            $table->enum ('YEARABROAD', ['0', '1', '2'])->nullable();
            $table->integer ('KISAIM');


            $table->primary ('KISCOURSEID');
            $table->foreign('UKPRN')->references('UKPRN')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
