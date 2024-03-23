<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Repositories\OrderRepository;

class Orders extends Component
{
    public Collection $orders;
    private OrderRepository $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->refresh();
    }

    public function refresh()
    {
        $this->orders = $this->orderRepository->getTotals();
    }

    public function render()
    {
        return view('livewire.orders');
    }
}
