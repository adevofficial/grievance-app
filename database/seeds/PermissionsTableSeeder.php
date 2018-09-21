<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'status_create',
                'created_at' => '2019-03-31 20:58:26',
                'updated_at' => '2019-03-31 20:58:26',
            ),
        ));
        
        
    }
}