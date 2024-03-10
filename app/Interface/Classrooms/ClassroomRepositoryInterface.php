<?php
namespace App\Interface\Classrooms;

interface ClassroomRepositoryInterface
{
    // get all grades
    public function allClassroom();
    
    // add grades
    public function createClassroom($request);
    
    // update grades
    public function updateClassroom($request);
    
    // destroy grades
    
    public function destroyClassroom($id);
}
