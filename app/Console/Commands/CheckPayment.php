<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdereModel;

class CheckPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all in progress payment and update if any inprogress payment status is paid in cashfree site';

    /**
     * Create a new command instance.
     1=success
     2=fail
     3=inprogress
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
        $data=OrdereModel::orderBy('id','desc')->skip(0)->take(3)->where('status_id','3')->get();
         $a=[];
         foreach ($data as $key => $value) {
           
           $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.cashfree.com/pg/orders/'.$value->id.'', [
              'headers' => [
                'Accept' => 'application/json',
                'x-api-version' => '2022-01-01',
                'x-client-id' => '160598c8dac03e4eb0df1bf8f6895061',
                'x-client-secret' => 'a174bdc9c27523fdcc5df8929c07fdc093dddf1a',
              ],
            ]);

            $data = json_decode($response->getBody());

            if($data->order_status=="PAID"){
                OrdereModel::where('status_id','3')->where('id',$value->id)->update(['status_id'=>'1','transaction_id'=>$data->cf_order_id]);
            }
            // array_push($a, $data->order_status);
            //echo $data->order_status;
         }


             echo"done";

            //dd($a);
    }
}
