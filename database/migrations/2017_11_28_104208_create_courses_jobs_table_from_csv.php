<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesJobsTableFromCsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_jobs', function($table){
            
            $table->string ('KISCOURSEID')->unique();
            $table->integer ('KISMODE');
            $table->string ('COMSBJ');
            $table->string ('JOB');
            $table->integer ('PERC');
            $table->integer ('JOBID')->unique();

            $table->foreign('KISCOURSEID')->references('KISCOURSEID')->on('courses');
            $table->foreign('JOBID')->references('ID')->on('jobs');
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
