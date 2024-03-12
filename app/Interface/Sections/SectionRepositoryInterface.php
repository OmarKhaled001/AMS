<?php
namespace App\Interface\Sections;

interface SectionRepositoryInterface
{
    // get all Section
    public function allSection();
    
    
    // get all Section
    public function allSectionByClassroom();
    
    // add Section
    public function createSection($request);
    
    // update Section
    public function updateSection($request);
    
    // destroy Section
    public function destroySection($id);
    
}
