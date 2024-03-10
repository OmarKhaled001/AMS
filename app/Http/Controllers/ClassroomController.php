<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Interface\Classrooms\ClassroomRepositoryInterface;

class ClassroomController extends Controller
{
    protected $Classrooms;

    public function __construct(ClassroomRepositoryInterface $Classrooms)
    {
        $this->Classrooms = $Classrooms;
    }

    // get all grades
    public function index()
    {
        return  $this->Classrooms->allClassroom();
    }
    

    public function store(Request $request)
    {
        return  $this->Classrooms->createClassroom($request);
        //
    }
    
    
    public function update(Request $request)
    {
        return  $this->Classrooms->updateClassroom($request);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return  $this->Classrooms->destroyClassroom($id);
        //
    }
}
