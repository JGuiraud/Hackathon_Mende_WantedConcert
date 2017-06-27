<?php

use Illuminate\Database\Seeder;

class DisposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispos')->insert([
            'type' => 'terrain',
            'superficie' => '2000',
            'ville' => 'mende',
            'latVille' => '44.51667',
            'lonville' => '3.5',
            'latA' => '44.51611234843277',
            'lonA' => '3.5019457340240483',
            'latB' => '44.51558830517571',
            'lonB' => '3.502771854400635',
            ]);
    }
}
