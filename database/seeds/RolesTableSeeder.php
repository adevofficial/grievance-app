<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'user',
                'created_at' => '2019-03-31 20:57:46',
                'updated_at' => '2019-03-31 20:57:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'evaluator',
                'created_at' => '2019-03-31 20:57:54',
                'updated_at' => '2019-03-31 20:57:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admin',
                'created_at' => '2019-03-31 20:58:00',
                'updated_at' => '2019-03-31 20:58:00',
            ),
        ));
        
        
    }
}