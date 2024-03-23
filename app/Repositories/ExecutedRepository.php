<?php

namespace App\Repositories;

use App\Models\Executed;
use Illuminate\Support\Facades\DB;

class ExecutedRepository
{
    public function create($totalOrders, $totalCost)
    {
        return Executed::create([
            'total_orders' => $totalOrders,
            'total_cost' => $totalCost,
        ]);
    }

    public function getLast()
    {
        return DB::table('executed')->latest('created_at')->first();
    }
}
