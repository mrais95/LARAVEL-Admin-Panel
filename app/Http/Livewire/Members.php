<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;

class Members extends Component
{
    public $members;

    public function render()
    {
        $this->members = Member::orderBy('created_at', 'DESC')->get();
        return view('livewire.members');
    }
}
