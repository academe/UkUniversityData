<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $duplications = 0;

        if (($handle = fopen ( public_path () . '/KISCOURSE.csv', 'r' )) !== FALSE) {
            $once = true;

            while ( ($data = fgetcsv ( $handle, 0, ',' )) !== FALSE ) {
                if($once){ $once = false; continue; }
                    try{
                        $course_data = new Course();

                        $course_data->PUBUKPRN    = $data[0];
                        $course_data->UKPRN       = $data[1];
                        $course_data->ASSURL      = $data[2];
                        $course_data->ASSURLW     = $data[3];
                        $course_data->CRSEURL     = $data[4];
                        $course_data->CRSEURLW    = $data[5]; 
                        $course_data->DISTANCE    = $data[6];    
                        $course_data->EMPLOYURL   = $data[7];                   
                        $course_data->EMPLOYURLW  = $data[8];
                        $course_data->FOUNDATION  = $data[9];
                        $course_data->HONOURS     = $data[10];
                        // $course_data->JACS
                        $course_data->KISCOURSEID = $data[14];
                        // $course_data->KISMODE     = $data[15];
                        // $course_data->LDCS
                        $course_data->LOCCHNGE    = $data[19];
                        $course_data->LTURL       = $data[20];
                        $course_data->LTURLW      = $data[21];
                        $course_data->NHS         = $data[22];
                        $course_data->NUMSTAGE    = $data[23];
                        $course_data->SANDWHICH   = $data[24];
                        $course_data->SUPPORTURL  = $data[25];
                        $course_data->SUPPORTURLW = $data[26];
                        $course_data->TITLE       = $data[27];
                        $course_data->TITLEW      = $data[28];
                        $course_data->UCASPROGID  = $data[29];
                        $course_data->UKPRNAPPLY  = $data[30];
                        $course_data->YEARABROAD  = $data[31];
                        $course_data->KISAIM      = $data[32];

                        $course_data->save();
                    }
                    catch (Illuminate\Database\QueryException $e){
                        $error_code = $e->errorInfo[1];
                        
                        if($error_code == 1062){
                            $duplications++;
                            echo "Course: ".$data[14]." already exists, skipping record.". PHP_EOL;
                        }
                    }
                }


            }
            fclose ( $handle );

        echo "Duplicate records: ".$duplications . PHP_EOL;
    }
}
