<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Faker\Factory::create();

	    for($i = 1; $i <= 150; $i++)
	    {
		    DB::table('posts')->insert([
			    'title' => $faker->realText($maxNbChars=80),
			    'description' => $faker->realText($maxNbChars=150),
		    ]);
	    }
    }
}
