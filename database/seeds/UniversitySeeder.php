<?php

use Illuminate\Database\Seeder;
use App\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen ( __DIR__ . '/../data/learning-providers-plus.csv', 'r' )) !== FALSE) {
            $once = true;
            
            while ( ($data = fgetcsv ( $handle, 0, ',' )) !== FALSE ) {
                if($once){ $once = false; continue; }

                $uni_data = new University();

                $uni_data->UKPRN                = $data[0];
                $uni_data->PROVIDER_NAME        = $data[1];
                $uni_data->VIEW_NAME            = $data[2];
                $uni_data->SORT_NAME            = $data[3];
                $uni_data->ALIAS                = $data[4];
                $uni_data->FLAT_NAME_NUMBER     = $data[5];
                $uni_data->BUILDING_NAME_NUMBER = $data[6];
                $uni_data->LOCALITY             = $data[7];
                $uni_data->STREET_NAME          = $data[8];
                $uni_data->TOWN                 = $data[9];
                $uni_data->POSTCODE             = $data[10];
                $uni_data->WEBSITE_URL          = $data[11];

                $uni_data->save();

                }


            }
            fclose ( $handle );
    }
}
