<?php

namespace App\Jobs;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ProcessExecuteTotal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->queue = 'ExecuteTotal';
    }

    /**
     * Execute the job.
     * @throws Exception
     */
    public function handle(): void
    {
        $total = DB::table('orders_lines')
            ->join('products', 'orders_lines.product_id', '=', 'products.id');

        $totalCost = $total->sum(DB::raw('orders_lines.qty * products.cost'));
        $totalOrders = $total->count('orders_lines.order_id');


        $endpoint = "http://localhost/api/executed/create";
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        try {
            $response = $client->post($endpoint, [
                'body' => json_encode([
                    'total_cost' => $totalCost,
                    'total_orders' => $totalOrders,
                ])
            ]);

            if($response->getStatusCode() !== 200) {
                throw new Exception('Error on send totals to /api/executed/create');
            }
        } catch (GuzzleException $e) {
            throw new Exception($e);
        }
    }
}
