<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class Schoolcards extends Component
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
        $query = School::query();


        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('school_id', 'like', '%' . $this->search . '%')
                ->orWhere('district', 'like', '%' . $this->search . '%')
                ->orWhere('division', 'like', '%' . $this->search . '%')
                ->orWhere('region', 'like', '%' . $this->search . '%')
                ->orWhere('principal', 'like', '%' . $this->search . '%');
        }

        $records = $query->paginate(12);

        return view('livewire.schoolcards', compact('records'));
    }
}
