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
    	// User::create([
    	// 	'name'=>'Cosme Fulanito',
    	// 	'email'=>'cosme@gmail.com',
    	// 	'password'=>bcrypt('123123')
    	// ]);
    	DB::table('users')->insert([
            'name'=>'Cosme Fulanito',
    		'email'=>'cosme@gmail.com',
    		'password'=>bcrypt('123123')
        ]);
    }
}
