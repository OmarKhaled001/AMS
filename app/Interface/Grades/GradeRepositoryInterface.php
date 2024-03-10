<?php
namespace App\Interface\Grades;

interface GradeRepositoryInterface
{
    // get all grades
    public function allGrade();
    
    // add grades
    public function createGrade($request);
    
    // update grades
    public function updateGrade($request);
    
    // destroy grades
    public function destroyGrade($id);
    
}
