<?php

namespace App\Livewire;

use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sectionform extends Component
{
    public $id, $action;

    public $name;
    public $school_year;
    public $level;
    public $filipino_teacher_id;
    public $english_teacher_id;
    public $math_teacher_id;
    public $science_teacher_id;
    public $ap_teacher_id;
    public $esp_teacher_id;
    public $tle_teacher_id;
    public $music_teacher_id;
    public $arts_teacher_id;
    public $pe_teacher_id;
    public $health_teacher_id;
    public $adviser_id;
    public $created_by;
    public $active_flag = 'Y';

    public function mount($id = null, $action = ACTION_ADD)
    {
        // Check if ID is provided and decrypt it
        if ($id) {
            $this->id = decrypt($id);
        } else {
            $this->id = null;
        }

        $this->created_by = Auth::user()->id;
        // Decrypt the action (optional)
        $this->action = decrypt($action);


        // If the ID is not null, retrieve the record for editing
        if ($this->id) {
            $record = Section::find($this->id);

            if ($record) {
                // Populate fields for editing
                $this->name = $record->name;
                $this->school_year = $record->school_year;
                $this->level = $record->level;
                $this->filipino_teacher_id = $record->filipino_teacher_id ?? 0;
                $this->english_teacher_id = $record->english_teacher_id ?? 0;
                $this->math_teacher_id = $record->math_teacher_id ?? 0;
                $this->science_teacher_id = $record->science_teacher_id ?? 0;
                $this->ap_teacher_id = $record->ap_teacher_id ?? 0;
                $this->esp_teacher_id = $record->esp_teacher_id ?? 0;
                $this->tle_teacher_id = $record->tle_teacher_id ?? 0;
                $this->music_teacher_id = $record->music_teacher_id ?? 0;
                $this->arts_teacher_id = $record->arts_teacher_id ?? 0;
                $this->pe_teacher_id = $record->pe_teacher_id ?? 0;
                $this->health_teacher_id = $record->health_teacher_id ?? 0;
                $this->adviser_id = $record->adviser_id ?? 0;
                $this->created_by = $record->created_by;
                $this->active_flag = $record->active_flag;
            } else {
                // Handle the case where the record is not found
                session()->flash('error', 'Record not found.');
                $this->redirect('/manage-sections');
            }
        }
    }

    public function save()
    {
        // Validate the input data
        $section_model = new Section();
        $validatedData = $this->validate($section_model->rules);
        $validatedData['filipino_teacher_id'] = $this->filipino_teacher_id ?: null;
        $validatedData['english_teacher_id'] = $this->english_teacher_id ?: null;
        $validatedData['math_teacher_id'] = $this->math_teacher_id ?: null;
        $validatedData['science_teacher_id'] = $this->science_teacher_id ?: null;
        $validatedData['ap_teacher_id'] = $this->ap_teacher_id ?: null;
        $validatedData['esp_teacher_id'] = $this->esp_teacher_id ?: null;
        $validatedData['tle_teacher_id'] = $this->tle_teacher_id ?: null;
        $validatedData['music_teacher_id'] = $this->music_teacher_id ?: null;
        $validatedData['pe_teacher_id'] = $this->pe_teacher_id ?: null;
        $validatedData['arts_teacher_id'] = $this->arts_teacher_id ?: null;
        $validatedData['health_teacher_id'] = $this->health_teacher_id ?: null;
        $validatedData['adviser_id'] = $this->adviser_id ?: null;

        $validatedData['active_flag'] = 'Y';



        if ($this->id) {
            // If the ID exists, update the existing section record
            $section = Section::find($this->id);
            if ($section) {
                $section->update($validatedData);

                session()->flash('success', 'Record for ' . $validatedData['name'] . ' has been updated.');
                $this->redirect('/manage-sections');
            } else {
                session()->flash('error', 'Record not found.');
                return;
            }
        } else {
            // If no ID is provided, create a new section
            Section::create($validatedData);

            session()->flash('success', 'Record for ' . $validatedData['name'] . ' has been added.');
            $this->redirect('/manage-sections');
        }
    }

    public function render()
    {
        // Fetch the active teachers
        $teachers = User::where('active_flag', 'Y')->get();
        $schoolYears = [];

        // Add the "Choose one" option as the first element
        $schoolYears[""] = "Choose one";
        
        // Loop from 2010 to 2050
        for ($year = 2010; $year < 2050; $year++) {
            // Create the school year in the format "YYYY-YYYY"
            $schoolYears[$year . '-' . ($year + 1)] = $year . '-' . ($year + 1);
        }

        return view('livewire.sectionform', compact('teachers', 'schoolYears'));
    }
}
