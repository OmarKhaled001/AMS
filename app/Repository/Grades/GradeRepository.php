<?php

namespace App\Repository\Grades;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Interface\Grades\GradeRepositoryInterface;

class GradeRepository implements GradeRepositoryInterface
{
    public function allGrade()
    {
        // get all grade
        $grades = Grade::all();
        // return view with data
        return view('pages.grades.all',compact('grades'));
    }


    public function createGrade($request)
    { 
        // check date valid or no
        $request->validate([
            'name' => 'required|max:255',
            'name_en' => 'required|max:255',
            'notes' => 'required',
            'notes_en' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // create grade by request
            $Grade = new Grade();
            $Grade-> name  = ['en' => $request->name_en, 'ar' => $request->name];
            $Grade-> notes = ['en' => $request->notes_en, 'ar' => $request->notes];
            // save grade
            $Grade->save();
            DB::commit();
            // alert and redirect to grades table 
            Alert::success(trans('msg.success'), trans('msg.add'));
            return redirect()->route('grades.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function updateGrade($request)
    {
        // check date valid or no
        $request->validate([
            'id' => 'required',
            'name' => 'required|max:255',
            'notes' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // find grade by request id
            $Grade = Grade::find($request->id);
            // update grade by request
            $Grade-> name  = $request->name;
            $Grade-> notes = $request->notes;
            // save grade
            $Grade->save();
            DB::commit();
            // alert and redirect to grades table 
            Alert::success(trans('msg.success'), trans('msg.edit'));
            return redirect()->route('grades.index');
        }
        // if has not been updated 
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->toast($e->getMessage(),'success');
        }
    }


    public function destroyGrade($id)
    {
        // destory grade by id and alert
        if(Grade::destroy($id)){
            Alert::success(trans('msg.success'), trans('msg.delete'));
            return redirect()->back();
        }else{
            Alert::error(trans('msg.error'));
            return redirect()->back();
        }
    }
}
