<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'user',
            'slug' => 'user',
            ]);
        DB::table('roles')->insert([
            'name' => 'proprietaire',
            'slug' => 'pro',
            ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'slug' => 'admin',
            ]);
    }
}
