<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExecutedRequest;
use App\Models\Executed;
use App\Repositories\ExecutedRepository;
use Illuminate\Http\JsonResponse;

class ExecutedController extends Controller
{
    public function __construct(protected ExecutedRepository $executedRepository)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateExecutedRequest $request): JsonResponse
    {
        $totalOrders = $request->input('total_orders');
        $totalCost = $request->input('total_cost');

        return response()->json($this->executedRepository->create($totalOrders, $totalCost));
    }
}
