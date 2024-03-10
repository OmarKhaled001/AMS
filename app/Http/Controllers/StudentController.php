<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Interface\Students\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $Students;

    public function __construct(StudentRepositoryInterface $Students)
    {
        $this->Students = $Students;
    }

    public function index()
    {
        return  $this->Students->allStudent();
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->Students->addForm();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Students->createStudent($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
