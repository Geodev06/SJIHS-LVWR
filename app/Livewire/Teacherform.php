<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Teacherform extends Component
{
    public $id, $action;

    public $name;
    public $email;
    public $sex = 'M';
    public $role;
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
            $record = User::find($this->id);

            if ($record) {
                // Populate fields for editing
                $this->name = $record->name;
                $this->sex = $record->sex;
                $this->email = $record->email;
                $this->role = $record->role;
                $this->active_flag = $record->active_flag;
            } else {
                // Handle the case where the record is not found
                session()->flash('error', 'Record not found.');
                $this->redirect('/manage-users');
            }
        }
    }

    public function save()
    {

        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:100|unique:users,email,' . $this->id ?? '',
            'sex' => 'required',
            'active_flag' => 'required'
        ]);


        
        if ($this->id) {
            // If the ID exists, update the existing section record
            $data = User::find($this->id);

            if ($data) {

                $data->update($validatedData);


                session()->flash('success', 'Record for ' . $validatedData['name'] . ' has been updated.');
                $this->redirect('/manage-users');
            } else {
                session()->flash('error', 'Record not found.');
                return;
            }
        } else {
            // If no ID is provided, create a new section
            $validatedData['password'] = Hash::make(DEFAULT_PASSWORD);

            User::create($validatedData);

            session()->flash('success', 'Record for ' . $validatedData['name'] . ' has been added.');
            $this->redirect('/manage-users');
        }
    }

    public function render()
    {

        return view('livewire.teacherform');
    }
}
