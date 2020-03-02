<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libs\MyEmail;
use Storage;
use Mail;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email';

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
        // $mail_data = [
        //     'name'=> 'Ano Ne',
        //     'email'=> 'halimabuabu@gmail.com',
        //     'to'=> 'halimabuabu@gmail.com',
        //     'subject'=> 'Email Testing' 
        // ];

        // $email_data = [
        //     'data' => $mail_data,
        //     'template' => '_emails.test',
        //     'attachment' => Storage::get('test.pdf'),
        //     'attachment_name' => 'Tesing.pdf'
        // ];

        // $e = new MyEmail();
        // $sent = $e->send($email_data);
        
        Mail::to('halimabuabu@gmail.com')->send(new \App\Mail\TestMail());
    }
}
