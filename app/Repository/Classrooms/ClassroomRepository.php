<?php

namespace App\Repository\Classrooms;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Interface\classrooms\ClassroomRepositoryInterface;
use App\Models\Classroom;

class ClassroomRepository implements ClassroomRepositoryInterface
{
    public function allClassroom()
    {
        // get all Classroom
        $classrooms = Classroom::paginate(10);
        // get all grade
        $grades = Grade::all();
        // return view with data
        return view('pages.classrooms.all',compact(['classrooms','grades']));
    }


    public function createClassroom($request)
    { 
        // check date valid or no
        $request->validate([
            'name' => 'required|max:255',
            'name_en' => 'required|max:255',
            'grade_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // create grade by request
            $classrooms = new Classroom();
            $classrooms-> name  = ['en' => $request->name_en, 'ar' => $request->name];
            $classrooms-> grade_id =  $request->grade_id;
            // save grade
            $classrooms->save();
            DB::commit();
            // alert and redirect to grades table 
            Alert::success(trans('msg.success'), trans('msg.add'));
            return redirect()->route('classrooms.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function updateClassroom($request)
    {
        // check date valid or no
        $request->validate([
            'name' => 'required|max:255',
            'grade_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // find classroom by id
            $classrooms = Classroom::findOrFail($request->id);
            // update classroom by request
            $classrooms-> name     = $request->name;
            $classrooms-> grade_id =  $request->grade_id;
            // save classroom
            $classrooms->save();
            DB::commit();
            // alert and redirect to classroom table 
            Alert::success(trans('msg.success'), trans('msg.edit'));
            return redirect()->route('classrooms.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroyClassroom($id)
    {
        // destory grade by id and alert
        if(Classroom::destroy($id)){
            Alert::success(trans('msg.success'), trans('msg.delete'));
            return redirect()->back();
        }else{
            Alert::error(trans('msg.error'));
            return redirect()->back();
        }
    }
}