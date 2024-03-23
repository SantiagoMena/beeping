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
            ->join('products', 'orders_lines.product_id', '=', 'products.id')
            ->select(
                DB::raw('SUM(orders_lines.qty * products.cost) as total_cost'),
                DB::raw('COUNT(orders_lines.order_id) as total_orders')
            )
            ->get();

        $totalCost = $total->first()->total_cost;
        $totalOrders = $total->first()->total_orders;

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
