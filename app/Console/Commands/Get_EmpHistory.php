<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class Get_EmpHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:empwebhistory{ip_address}';

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
        $c =  $this->argument('ip_address');
        // get data based on Ip address
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://127.0.0.1:8000/api/empsearch/'.$c);
        $response = $request->getBody();
        $this->info("result".$response);

    }
}