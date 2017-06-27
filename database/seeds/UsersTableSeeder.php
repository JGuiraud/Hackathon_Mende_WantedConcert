<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'lastName' => 'Admin_lastName',
        'firstName' => 'Admin_firstName',
        'email' => 'admin@example.com',
        'password' => bcrypt('azerty'),
        ]);
        DB::table('users')->insert([
        'lastName' => 'Patulacci',
        'firstName' => 'Marcel',
        'email' => 'marcelpatulacci@example.com',
        'password' => bcrypt('azerty'),
        ]);

        DB::table('users')->insert([
        'lastName' => 'Bidon',
        'firstName' => 'Jean',
        'email' => 'jenbidon@example.com',
        'password' => bcrypt('azerty'),
        ]);
    }
}
