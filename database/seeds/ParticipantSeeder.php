<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Event;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        for($i = 0; $i < 50; $i++){
        	$request = new \Illuminate\Http\Request();
        	$nn = $faker->userName;
        	$request->replace([
	    		'event_id' => Event::inRandomOrder()->value('id'),
	    		'full_name' => $faker->name,
	    		'nick_name' => $nn,
	    		'place_of_birth' => $faker->city,
	    		'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
	    		'phone' => $faker->phoneNumber,
	    		'email' => $faker->email,
	    		'instagram' => $nn,
	    		'twitter' => $nn,
	    		'facebook' => $nn,
	    		'agency' => $faker->company,
	    		'position' => $faker->jobTitle,
	    		'years_of_service' => rand(1, 10)." tahun",
	    		'strength' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'weakness' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'opportunity' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'challenge' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'short_story' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'hope_in_life' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'hope_in_training' => $faker->sentence($nbWords = 10, $variableNbWords = true)        		
        	]);

        	app('App\Http\Controllers\EventRegisterController')->register($request);
        }
    }
}
