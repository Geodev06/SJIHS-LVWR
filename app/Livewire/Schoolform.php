<?php

namespace App\Livewire;

use App\Models\School;
use App\Models\User;
use Livewire\Component;

class Schoolform extends Component
{
    public $id, $action;

    public $name;
    public $school_id;
    public $district;
    public $division;
    public $region;
    public $principal;

 
    public $active_flag = 'Y';

    public function mount($id = null, $action = ACTION_ADD)
    {
        // Check if ID is provided and decrypt it
        if ($id) {
            $this->id = decrypt($id);
        } else {
            $this->id = null;
        }

        // Decrypt the action (optional)
        $this->action = decrypt($action);


        // If the ID is not null, retrieve the record for editing
        if ($this->id) {
            $record = School::find($this->id);

            if ($record) {
                // Populate fields for editing
                $this->name = $record->name;
                $this->school_id = $record->school_id;
                $this->district = $record->district;
                $this->division = $record->division;
                $this->region = $record->region;
                $this->principal = $record->principal;



            } else {
                // Handle the case where the record is not found
                session()->flash('error', 'Record not found.');
                $this->redirect('/manage-schools');
            }
        }
    }

    public function save()
    {
        // Validate the input data
        $model = new School();
        $validatedData = $this->validate($model->rules);

        $validatedData['active_flag'] = 'Y';

        if ($this->id) {
            $record = School::find($this->id);
            if ($record) {
                $record->update($validatedData);

                session()->flash('success', 'Record for ' . $validatedData['name'] . ' has been updated.');
                $this->redirect('/manage-schools');
            } else {
                session()->flash('error', 'Record not found.');
                return;
            }
        } else {
            // If no ID is provided, create a new section
            School::create($validatedData);

            session()->flash('success', 'Record for ' . $validatedData['name'] . ' has been added.');
            $this->redirect('/manage-schools');
        }
    }

    public function render()
    {
        // Fetch the active teachers
     
        return view('livewire.schoolform');
    }
}
