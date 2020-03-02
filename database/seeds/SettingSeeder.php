<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	'parameter' => 'LAST_COUNT_GENERATED_CERTIFICATE',
        	'value' => '3798'
        ]);
    }
}
