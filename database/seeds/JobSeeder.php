<?php

use Illuminate\Database\Seeder;
use App\Course_Job;
use App\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fetch all stored jobs for comparisons
        $jobsStored   = array();
        $jobs         = App\Job::all();
        $i            = 0;
        $duplications = 0;

        foreach($jobs as $job){
            $jobsStored[$i]['ID']    = $job['ID'];
            $jobsStored[$i]['TITLE'] = strtolower(trim($job['TITLE']));
            $i++;
        }

        if (($handle = fopen ( __DIR__ . '/../data/JOBLIST.csv', 'r' )) !== FALSE) {
            $once = true;

            while ( ($data = fgetcsv ( $handle, 0, ',' )) !== FALSE ) {
                if($once){$once = false; continue; }

                $exists = FALSE;
                $title = strtolower(trim($data[5]));


                for($i=0; $i<count($jobsStored); $i++){
                    if(($title == $jobsStored[$i]['TITLE']) && $exists == FALSE){
                        $exists = TRUE;
                        $id     = $jobsStored[$i]['ID'];
                    }
                }

                if($exists == FALSE) {
                    //Store in jobs table & add to storedJobs array
                    $jobs_data        = new Job;
                    $jobs_data->TITLE = $title;
                    $jobs_data->save();
                    
                      
                    $jobCount                       = count($jobsStored);
                    $id                             = $jobs_data->ID; 
                    $jobsStored[$jobCount]['ID']    = $id;
                    $jobsStored[$jobCount]['TITLE'] = $title;

                }

                try {
                    //Store in courses_jobs table
                    $courses_jobs_data              = new Course_Job;
                    $courses_jobs_data->KISCOURSEID = $data[2];
                    $courses_jobs_data->KISMODE     = $data[3];
                    $courses_jobs_data->COMSBJ      = $data[4];
                    $courses_jobs_data->JOB         = $title;
                    $courses_jobs_data->PERC        = $data[6];
                    $courses_jobs_data->JOBID        = $id;
                    $courses_jobs_data->save();

                } catch (Illuminate\Database\QueryException $e){
                    $error_code = $e->errorInfo[1];

                    if($error_code == 1062){
                        $duplications++;
                        echo "Multiple entries: KISCOURSEID - ".$data[2].", KISMODE - " . $data[3] . " JOBID - " . $id . PHP_EOL;

                    } else {
                        throw $e;
                    }
                    
                }

            }
            fclose ( $handle ); 

            echo "Duplications: " . $duplications . PHP_EOL;
        }
    }
}