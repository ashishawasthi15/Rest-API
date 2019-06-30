<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Http\Controllers\API\PostAPIController;
class Delete_EmpHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unset:empwebhistory {ip_address}';

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
        $this->info("Hello".$this->argument('ip_address'));
        $ip_address = $this->argument('ip_address');
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8000/api/empdel/".$ip_address;
        $request = $client->delete($url);
        $request->getStatusCode();
        $this->info("result".$request->getStatusCode());

    }
}
