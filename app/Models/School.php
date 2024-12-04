<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'school_id', 'district', 'division', 'region', 'principal'];

    public $rules = [
        'name'                => 'required|string|max:255',
        'school_id'         => 'required|string|max:255',
        'district'         => 'required|string|max:255',
        'division'         => 'required|string|max:255',
        'region'         => 'required|string|max:255',
        'principal'         => 'required|string|max:255'
    ];
}
