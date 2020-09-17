<?php

use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('properties')->insert( [
            'title' => 'Imovel teste',
            'total' => 12345,
            'created_at' => getDateNow(),
            'updated_at' => getDateNow(),
        ] );
    }
}
