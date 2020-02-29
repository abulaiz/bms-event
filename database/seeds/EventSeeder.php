<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	$type = ['1', '2'];
        for($i = 0; $i < 10; $i++){
        	$request = new \Illuminate\Http\Request();

            $rand = rand(-4, 4);
        	$start_date = date('Y-m-d', strtotime( $rand == 0 ? "now" : ($rand > 0 ? "+$rand day" : "-$rand day")  ));
            $rand2 = rand(1, 5);
        	$end_date = date('Y-m-d', strtotime("+ $rand2 day"));

        	$request->replace([
	    		'name' => $faker->sentence($nbWords = rand(2, 4), $variableNbWords = true),
	    		'started_date' => $start_date,
	    		'ended_date' => $end_date,
	    		'place' => $faker->city,
	    		'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'agency' => $faker->company,
	            'type' => $type[rand(0, 1)]
        	]);

        	app('App\Http\Controllers\EventController')->store($request);
        }
    }
}
