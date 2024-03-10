<?php

namespace App\Http\Controllers;

use App\Interface\Teachers\TeacherRepositoryInterface;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $Teachers;

    public function __construct(TeacherRepositoryInterface $Teachers)
    {
        $this->Teachers = $Teachers;
    }

    public function index()
    {
        return  $this->Teachers->allTeacher();
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return  $this->Teachers->addForm();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Teachers->createTeacher($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return  $this->Teachers->updateTeacher($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return  $this->Teachers->destroyTeacher($id);
    }
}
