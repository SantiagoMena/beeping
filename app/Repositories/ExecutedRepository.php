<?php

namespace App\Repositories;

use App\Models\Executed;

class ExecutedRepository
{
    public function create($totalOrders, $totalCost)
    {
        return Executed::create([
            'total_orders' => $totalOrders,
            'total_cost' => $totalCost,
        ]);
    }
}
