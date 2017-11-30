<?php

use Illuminate\Database\Seeder;
use App\Institution;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $errors = 0;
        $errors_array = array();

        if (($handle = fopen ( __DIR__ . '/../data/INSTITUTION.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                if($data[0] == $data[1]){
                    try{
                        $institution_data = new Institution();

                        $institution_data->PUBUKPRN        = $data[0];
                        $institution_data->UKPRN           = $data[1];
                        $institution_data->COUNTRY         = $data[2];
                        $institution_data->PUBUKPRNCOUNTRY = $data[3];
                        $institution_data->TEFOutcome      = $data[4];
                        $institution_data->APROutcome      = $data[5];
                        $institution_data->SUURL           = $data[6];
                        $institution_data->SUURLW          = $data[7];
                        
                        $institution_data->save();
                    }
                    catch (Illuminate\Database\QueryException $e){
                        $error_code = $e->errorInfo[1];

                        if($error_code == 1062){
                            $errors_array[$errors] = $data[1];
                            $errors++;
                        }
                    }
                }


            }
            fclose ( $handle );
        }
        dump($errors_array);
    }
}
