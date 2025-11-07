<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];


    public function render()
    {
        $pools = Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', ['polls' => $pools]);
    }

    public function vote(Option $option) {

        // $option = Option::findOrFail($optionId);
        $option->votes()->create();


    }


}
