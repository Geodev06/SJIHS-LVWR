<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashbaordController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function manage_student_record()
    {
        return view('admin.pages.manage_student_record');
    }

    public function manage_sections()
    {
        return view('admin.pages.manage_sections');
    }

    public function schools()
    {
        return view('admin.pages.schools');
    }

    public function users()
    {
        return view('admin.pages.users');
    }

    public function student_form($id = NULL, $action = NULL)
    {
        return view('admin.pages.student_form', compact('id', 'action'));
    }

    public function section_form($id = NULL, $action = NULL)
    {
        return view('admin.pages.section_form', compact('id', 'action'));
    }

    public function school_form($id = NULL, $action = NULL)
    {
        return view('admin.pages.school_form', compact('id', 'action'));
    }

    public function user_form($id = NULL, $action = NULL)
    {
        return view('admin.pages.user_form', compact('id', 'action'));
    }
}
