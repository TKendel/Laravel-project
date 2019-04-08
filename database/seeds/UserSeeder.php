<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
        	'name'=>"toni",
        	'email'=>"toni.toni@me.com",
        	'password'=>bcrypt("password"),
            'admin'=>1,
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'about'=>'text',
            'link'=>'linkedin.com',
            'avatar'=>"public/images/posts/1.png",
        ]);
    }
}
