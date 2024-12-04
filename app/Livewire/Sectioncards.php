<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class Sectioncards extends Component
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
        $query = Section::query();


        if ($this->search) {
            $query->where('school_year', 'like', '%' . $this->search . '%')
                ->orWhere('level', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%');
        }

        $records = $query->with('adviser')->paginate(12);

        return view('livewire.sectioncards', compact('records'));
    }
}
