<?php

namespace App\Repository\Sections;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Interface\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function allSection()
    {
        $grades_list = Grade::with(['sections'])->get();
        // get all grade
        $grades = Grade::all();
        // get all grade
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $classroom_list = Classroom::all();
        // return view with data
        return view('pages.sections.all',compact('grades_list','classroom_list','grades','classrooms','teachers'));
    }


    public function allSectionByClassroom()
    {
        $sections = Section::whereHas('classroom', function ($query) {
            $query->whereId(request()->input('classroom_id', 0));
        })->pluck('name', 'id');
        return response()->json($sections);
    }


    public function createSection($request)
    { 
        // check date valid or no
        $request->validate([
            'name'        => 'required|max:255',
            'name_en'     => 'required|max:255',
            'grade_id'    => 'required',
            'classroom_id'=> 'required',
        ]);
        DB::beginTransaction();
        try {
            // create grade by request
            $sections = new Section();
            $sections-> name         =  ['en' => $request->name_en, 'ar' => $request->name];
            $sections-> grade_id     =  $request->grade_id;
            $sections-> classroom_id =  $request->classroom_id;
            $sections-> status       =  1;
            // save grade
            $sections->save();
            $sections->teachers()->attach($request->teacher_id);
            DB::commit();
            // alert and redirect to grades table 
            Alert::success(trans('msg.success'), trans('msg.add'));
            return redirect()->route('sections.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Update Section
    public function updateSection($request)
    {
        // check date valid or no
        $request->validate([
            'name' => 'required|max:255',
            'grade_id' => 'required',
            'classroom_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // find section by id
            $sections = Section::findOrFail($request->id);
            // update section by request
            $sections-> name          =  $request->name;
            $sections-> grade_id      =  $request->grade_id;
            $sections-> classroom_id  =  $request->classroom_id;
            $sections-> status        =  1;
            // save section
            $sections->save();
            DB::commit();
            // alert and redirect to section table 
            Alert::success(trans('msg.success'), trans('msg.edit'));
            return redirect()->route('sections.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Delete Section
    public function destroySection($id)
    {
        // destory grade by id and alert
        if(Section::destroy($id)){
            Alert::success(trans('msg.success'), trans('msg.delete'));
            return redirect()->back();
        }else{
            Alert::error(trans('msg.error'));
            return redirect()->back();
        }
    }
}