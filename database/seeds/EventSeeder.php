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
        shell_exec("sudo rm -rf storage/app/event_image");
        shell_exec("mkdir storage/app/event_image");

        shell_exec("sudo rm -rf storage/app/event_nametags");
        shell_exec("mkdir storage/app/event_nametags");        
    	$faker = Faker::create();
        for($i = 0; $i < 50; $i++){
        	$request = new \Illuminate\Http\Request();

            $rand = rand(-4, 4);
        	$start_date = date('Y-m-d', strtotime( $rand == 0 ? "now" : ($rand > 0 ? "+$rand day" : "-$rand day")  ));
            $rand2 =  $rand + rand(0, 5);
        	$end_date = date('Y-m-d', strtotime( $rand2 == 0 ? "now" : ($rand2 > 0 ? "+$rand2 day" : "-$rand2 day") ));

        	$request->replace([
	    		'name' => $faker->sentence($nbWords = rand(2, 4), $variableNbWords = true),
	    		'started_date' => $start_date,
	    		'ended_date' => $end_date,
	    		'place' => $faker->city,
	    		'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
	    		'agency' => $faker->company,
	            'type' => '1'
        	]);

        	app('App\Http\Controllers\EventController')->store($request);
        }
    }
}
