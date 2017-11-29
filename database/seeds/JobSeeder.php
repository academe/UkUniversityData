<?php

use Illuminate\Database\Seeder;

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
        $jobsStored = array();
        $jobs = App\Job::all();
        $i = 0;

        foreach($jobs as $job){
            $jobsStored[$i] = strtolower(trim($job['TITLE']));
            $i++;
        }

        if (($handle = fopen ( public_path () . '/JOBLIST.csv', 'r' )) !== FALSE) {
            $once = true;

            while ( ($data = fgetcsv ( $handle, 0, ',' )) !== FALSE ) {
                if($once){$once = false; continue; }

                $exists = FALSE;
                $title = strtolower(trim($data[5]));


                for($i=0; $i<count($jobsStored); $i++){
                    if(($title == $jobsStored[$i])){
                        $exists = TRUE;
                        $i = count($jobsStored);
                    }
                }

                //Store in courses_jobs table
                // $jobs_data = new Job

                if($exists == FALSE) {
                    //Store in jobs table & add to storedJobs array
                }



            }
            fclose ( $handle ); 
        }
    }
}