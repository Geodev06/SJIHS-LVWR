<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_year',
        'level',
        'filipino_teacher_id',
        'english_teacher_id',
        'math_teacher_id',
        'science_teacher_id',
        'ap_teacher_id',
        'esp_teacher_id',
        'tle_teacher_id',
        'music_teacher_id',
        'arts_teacher_id',
        'pe_teacher_id',
        'health_teacher_id',
        'adviser_id',
        'created_by',
        'active_flag'
    ];

    public $rules = [
        'name'                => 'required|string|max:255',
        'school_year'         => 'required|string|max:255',
        'level'               => 'required|integer|min:1',
        'filipino_teacher_id' => 'nullable|integer',
        'english_teacher_id' => 'nullable|integer',
        'math_teacher_id'     => 'nullable|integer',
        'science_teacher_id'  => 'nullable|integer',
        'ap_teacher_id'       => 'nullable|integer',
        'esp_teacher_id'      => 'nullable|integer',
        'tle_teacher_id'      => 'nullable|integer',
        'music_teacher_id'    => 'nullable|integer',
        'arts_teacher_id'     => 'nullable|integer',
        'pe_teacher_id'       => 'nullable|integer',
        'health_teacher_id'   => 'nullable|integer',
        'adviser_id'          => 'nullable|integer',
        'created_by'          => 'required|integer',
        'active_flag'         => 'required|in:Y,N',
    ];

    public function adviser()
    {
        return $this->belongsTo(User::class, 'adviser_id', 'id');
    }
}
