<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Userlist extends Component
{
    use WithPagination;

    public $search = ''; // Example: Age filter (optional)


    public function placeholder()
    {
        return view('placeholder.loading_cards');
    }
    
    public function render()
    {
        // Start the query
        $query = User::query();


        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('sex', 'like', '%' . $this->search . '%');
        }

        $records = $query->paginate(10);

        return view('livewire.userlist', compact('records'));
    }
}
