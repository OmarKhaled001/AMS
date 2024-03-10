<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interface\Grades\GradeRepositoryInterface;

class GradeController extends Controller
{
    protected $Grades;

    public function __construct(GradeRepositoryInterface $Grades)
    {
        $this->Grades = $Grades;
    }

    // get all grades
    public function index()
    {
        return  $this->Grades->allGrade();
    }

    // create grades
    public function store(Request $request)
    {
        return  $this->Grades->createGrade($request);
    }

    // update grades
    public function update(Request $request)
    {
        return  $this->Grades->updateGrade($request);
    }

    // destroy grades
    public function destroy(string $id)
    {
        return  $this->Grades->destroyGrade($id);
    }
}


