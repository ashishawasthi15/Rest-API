<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class GET extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:employee {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get employee data basis on ip_address Command description';

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
        $ip_address =  $this->argument('ip_address');
        // get data based on Ip address
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://127.0.0.1:8000/api/search/'.$ip_address);
        $response = $request->getBody();
        $this->info("result".$response);
    }
}
