<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class Set_EmpHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:empwebhistory {ip_address} {url}';

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
        $ipaddress =  $this->argument('ip_address');
        $url =  $this->argument('url');

        // Post
        $client = new \GuzzleHttp\Client();
        $apiurl='http://127.0.0.1:8000/api/emppost/'.$ipaddress;
        $request = $client->post($apiurl, [
            'form_params' => [
                'ip_address' => $ipaddress,
                'url' => $url
            ]
        ]);

        $request->getStatusCode();
        $this->info("result".$request->getStatusCode());
    }
}
