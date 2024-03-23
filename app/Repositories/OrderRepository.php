<?php

namespace App\Repositories;

use App\Models\Executed;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function getTotals(): Collection
    {
        return DB::table('orders')
            ->join('orders_lines', 'orders_lines.order_id', '=', 'orders.id')
            ->select(
                'orders.*',
                DB::raw('SUM(orders_lines.qty) as total_qty'),
                DB::raw('COUNT(orders_lines.product_id) as total_products')
            )
            ->groupBy(['orders.id'])
            ->get();
    }
}
