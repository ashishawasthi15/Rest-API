<?php

namespace App\Console\Commands;

use GuzzleHttp\Exception\ClientException;
use function GuzzleHttp\Psr7\get_message_body_summary;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Http\Controllers\API\PostAPIController;


class DEL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unset:employee {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete data based on ip_address';

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
        try {
            $ip_address = $this->argument('ip_address');
            $client = new \GuzzleHttp\Client();
            $url = "http://127.0.0.1:8000/api/delete/" . $ip_address;
            $request = $client->delete($url);

            if($request->getStatusCode() == '200' ){
                $this->info("Successfully data delete");
            }

        }catch (ClientException $e ){
          $result =  $this->ask("Do you want to see exception message y/n");

          if($result == 'y'){
            $this->info("Exception message :".$e.get_message_body_summary());
            }else{
              $this->info("Record is not exist into table.. ");
          }
        }
    }
}
