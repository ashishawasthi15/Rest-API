<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use App\Employee;
use Illuminate\Console\Command;
use App\Http\Controllers\API\PostAPIController;
class SET extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SET:employee {id} {emp_id}{epm_name}{ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Employee data to the database';

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


    //   $this->info("Hello".$this->argument('id'));
        $id =  $this->argument('id');
     $emp_id =  $this->argument('emp_id');
        $epm_name =  $this->argument('epm_name');
        $ip_address =  $this->argument('ip_address');
/*
       // get data based on Ip address
        $client = new \GuzzleHttp\Client();
       $request = $client->get('http://127.0.0.1:8000/api/search/191.168.10.10');
        $response = $request->getBody();
       $this->info("result".$response);*/


      // Post
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8000/api/posts";
        $request = $client->post('http://127.0.0.1:8000/api/posts', [
            'form_params' => [
                'id' => $id,
                'emp_id' => $emp_id,
               'epm_name' => $epm_name,
               'ip_address' => $ip_address

            ]
        ]);
        $request->getStatusCode();
        $this->info("result".$request->getStatusCode());



    }

}
