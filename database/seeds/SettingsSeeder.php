<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Settings::create([
        	'name'=>'laravel',
        	'contact_number'=>'4 2525 1234',
        	'contact_address'=>'city',
        	'email'=>'generic@mail.com'
        ]);
    }
}
