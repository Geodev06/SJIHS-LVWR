<?php

namespace App\Livewire;

use App\Models\StudentInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Studentrecordform extends Component
{

    public $id, $action;

    public $lrn;
    public $firstname;
    public $middlename;
    public $lastname;
    public $ext_name;
    public $birthdate;
    public $sex = 'M';
    public $elem_school_name;
    public $elem_school_id;
    public $elem_school_address;
    public $citation;
    public $general_average;
    public $pept_rating;
    public $pept_date;
    public $als_rating;
    public $als_address;
    public $others;
    



    public function mount($id = NULL, $action = ACTION_ADD)
    {

        if ($id == "") {
            $this->id = null;
        } else {
            $this->id = decrypt($id);
        }

        $this->action = decrypt($action);



        if (!is_null($this->id)) {
            // Use findOrFail to ensure you handle invalid IDs (404 Not Found) gracefully
            $record = StudentInformation::find($this->id);

            if ($record) { // Ensure record exists
                $this->lrn = $record->lrn;
                $this->firstname = $record->fname;
                $this->middlename = $record->mname;
                $this->lastname = $record->lname;
                $this->ext_name = $record->ext_name;
                $this->birthdate = $record->birthdate;
                $this->sex = $record->sex;
                $this->elem_school_name = $record->elem_school_name;
                $this->elem_school_id = $record->elem_school_id;
                $this->elem_school_address = $record->elem_school_address;
                $this->citation = $record->citation;
                $this->general_average = $record->general_average;
                $this->pept_date = $record->pept_date;
                $this->pept_rating = $record->pept_rating;
                $this->als_address = $record->als_address;
                $this->als_rating = $record->als_rating;
                $this->others = $record->others;
            }
        }
    }

    public function save()
    {
        // Validate the input data
        $validatedData = $this->validate([
            'lrn' =>  [
                'required',
                'numeric',
                'digits:12',
                Rule::unique('student_information')->ignore($this->id ?? null),
            ], // Assuming LRN is a 12-digit number
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',  // Optional field with string validation
            'lastname' => 'required|string|max:255',
            'ext_name' => 'nullable|string|max:5', // Optional extension name (e.g., Jr., Sr.)
            'birthdate' => 'required|date|before_or_equal:today',
            'sex' => 'required', // Assuming valid options are 'male', 'female', or 'other'
            'elem_school_name' => 'required|string|max:255',
            'elem_school_id' => 'required|string|max:100', // Assuming the school ID is alphanumeric, e.g., "1234A"
            'elem_school_address' => 'required|string|max:255',
            'citation' => 'nullable|string|max:255',
            'general_average' => 'required|numeric|between:75,100',
            'pept_rating' => 'nullable|numeric',
            'pept_date' => 'nullable|date|before_or_equal:today',
            'als_rating' => 'nullable|numeric',
            'als_address' => 'nullable|string|max:255',
            'others' => 'nullable|string|max:255'
        ], [
            // Custom error messages
            'firstname.required' => 'The First Name is required.',
            'lastname.required' => 'The Last Name is required.',
            'lrn.required' => 'The LRN (Learner Reference Number) is required.',
        ]);

        // Prepare the data for saving or updating
        $studentData = [
            'lrn' => $validatedData['lrn'],
            'fname' => $validatedData['firstname'],
            'mname' => $validatedData['middlename'] ?? null,  // If mname is not provided, it will be null
            'lname' => $validatedData['lastname'],
            'ext_name' => $validatedData['ext_name'] ?? null,
            'birthdate' => $validatedData['birthdate'],
            'sex' => $validatedData['sex'],
            'elem_school_name' => $validatedData['elem_school_name'],
            'elem_school_id' => $validatedData['elem_school_id'],
            'elem_school_address' => $validatedData['elem_school_address'],
            'citation' => $validatedData['citation'] ?? null,
            'general_average' => $validatedData['general_average'] ?? null,
            'pept_rating' => $validatedData['pept_rating'] ?? null,
            'pept_date' => $validatedData['pept_date'] ?? null,
            'als_rating' => $validatedData['als_rating'] ?? null,
            'als_address' => $validatedData['als_address'] ?? null,
            'others' => $validatedData['others'] ?? null,
            'created_by'=> Auth::user()->id
        ];

        // If the ID is provided, update the existing record, else create a new one
        if ($this->id) {
            // Update existing student record
            StudentInformation::find($this->id);

            if (StudentInformation::find($this->id)) {
                StudentInformation::find($this->id)->update($studentData);

                session()->flash('success', 'Record for ' . $validatedData['lrn'] . SUCCESS_UPDATE);

                $this->redirect('/manage-student-record');
            }
        } else {
            // Create a new student record

            StudentInformation::create($studentData);

            session()->flash('success', 'Record for ' . $validatedData['lrn'] . SUCCESS_ADD);

            $this->redirect('/manage-student-record');
        }
    }
    public function render()
    {
        return view('livewire.studentrecordform');
    }
}
