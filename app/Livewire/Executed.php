<?php

namespace App\Livewire;

use App\Repositories\ExecutedRepository;
use Livewire\Component;

class Executed extends Component
{
    public $executed;
    private ExecutedRepository $executedRepository;

    public function __construct()
    {
        $this->executedRepository = new ExecutedRepository();
        $this->refresh();
    }

    public function refresh(): void
    {
        $this->executed = $this->executedRepository->getLast();
    }

    public function render()
    {
        return view('livewire.executed');
    }
}
