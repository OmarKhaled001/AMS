<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students =Student::count();
        $teachers =Teacher::count();
        $sections =Section::count();
        $lastStudents = Student::orderBy("id", "DESC")->take(10)->get();;
        return view('index',compact('students','teachers','sections','lastStudents'));
    }
}
