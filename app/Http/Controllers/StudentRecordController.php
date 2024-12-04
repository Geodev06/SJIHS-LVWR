<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentRecordController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.student_record.student_record_index');
    }
}
