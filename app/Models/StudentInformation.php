<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    protected $fillable = [

        'lrn',
        'fname',
        'mname',
        'lname',
        'ext_name',
        'birthdate',
        'sex',
        'elem_school_name',
        'elem_school_id',
        'elem_school_address',
        'citation',
        'general_average',

        'pept_rating',
        'pept_date',

        'als_rating',
        'als_date',

        'others',
        'created_by'

    ];

    // In StudentInformation model
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
