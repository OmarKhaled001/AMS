<?php
namespace App\Interface\Teachers;

interface TeacherRepositoryInterface
{
    // get all Section
    public function allTeacher();

    // get all Section
    public function addForm();

    // add Section
    public function createTeacher($request);
    
    // update Section
    public function updateTeacher($request);
    
    // destroy Section
    public function destroyTeacher($id);
    
}
