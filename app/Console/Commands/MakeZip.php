<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use Zipper;

class MakeZip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:zip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files = storage_path('app/test');
        Zipper::make(storage_path('app/test/test.zip'))->add($files)->close();
    }
}
