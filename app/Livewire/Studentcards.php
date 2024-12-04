<?php

namespace App\Livewire;

use App\Models\StudentInformation;
use Livewire\Component;
use Livewire\WithPagination;

class Studentcards extends Component
{

    use WithPagination;

    public $lrn = ''; // Example: Age filter (optional)


    public function resetFilters()
    {
        $this->reset(['search', 'fname', 'lrn', 'mname', 'lname']);
    }

    public function placeholder() 
    {
        return view('placeholder.loading_cards');
        
    }

    public function render()
    {
        // Start the query
        $query = StudentInformation::query();


        if ($this->lrn) {
            $query->where('lrn', 'like', '%' . $this->lrn . '%')
                ->orWhere('fname', 'like', '%' . $this->lrn . '%')
                ->orWhere('mname', 'like', '%' . $this->lrn . '%')
                ->orWhere('lname', 'like', '%' . $this->lrn . '%');

        }

        // Paginate results
        $records = $query->with('creator')->paginate(12);

        return view('livewire.studentcards', compact('records'));
    }
}
