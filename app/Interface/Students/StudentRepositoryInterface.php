<?php
namespace App\Interface\Students;

interface StudentRepositoryInterface
{
    // get all Students
    public function allStudent();
    
    // get all Students
    public function addForm();
    
    // get all Students
    public function editForm($id);
    
    // add Students
    public function createStudent($request);
    
    // update Students
    public function updateStudent($request);
    
    // destroy Students
    public function destroyStudent($id);
    
}
