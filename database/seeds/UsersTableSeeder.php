<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@cep.ac.in',
                'password' => '$2y$10$F2wxIU4.inBG4ma3lk8c3eUDhesunsSilupCu4CX36Hu7.5tBCCBq',
                'remember_token' => NULL,
                'created_at' => '2019-03-31 20:59:48',
                'updated_at' => '2019-03-31 20:59:48',
            ),
        ));
        
        
    }
}