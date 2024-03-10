<?php

namespace App\Repository\Teachers;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Interface\Teachers\TeacherRepositoryInterface;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function allTeacher()
    {
        $grades          = Grade::all();
        $specializations = Specialization::all();
        $teachers        = Teacher::all();
        return view('pages.teachers.all', compact('teachers','grades','specializations'));
    }

    public function createTeacher($request)
    { 
        // check date valid or no
        $request->validate([
            'name' => 'required|max:255',
            'name_en' => 'required|max:255',
            'address' => 'required',
            'address_en' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'grade_id' => 'required',
            'specialization_id' => 'required',

        ]);
        DB::beginTransaction();
        try {
            // create grade by request
            $teachers = new Teacher();
            $teachers-> name              =  ['en' => $request->name_en, 'ar' => $request->name];
            $teachers-> address           =  ['en' => $request->address_en, 'ar' => $request->address];
            $teachers-> phone             =  $request->phone;
            $teachers-> email             =  $request->email;
            $teachers-> password          =  Hash::make($request->password);
            $teachers-> grade_id          =  $request->grade_id;
            $teachers-> specialization_id =  $request->specialization_id;
            $teachers-> joining_date      =  now();
            $teachers-> status            =  1;
            // save grade
            $teachers->save();
            DB::commit();
            // alert and redirect to grades table 
            Alert::success(trans('msg.success'), trans('msg.add'));
            return redirect()->route('teachers.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    

    // Update Section
    public function addForm()
    {
        $grades         = Grade::all();
        $specializations = Specialization::all();
        return view('pages.teachers.add' , compact('grades','specializations'));

    }
    

    // Update Section
    public function updateTeacher($request)
    {
                // check date valid or no
                $request->validate([
                    'name' => 'required|max:255',
                    'address' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email',
                    'grade_id' => 'required',
                    'specialization_id' => 'required',
        
                ]);
                DB::beginTransaction();
                try {
                    // create grade by request
                    $teachers = Teacher::find($request->id);
                    $teachers-> name              =  $request->name;
                    $teachers-> address           =  $request->address;
                    $teachers-> phone             =  $request->phone;
                    $teachers-> email             =  $request->email;
                    $teachers-> grade_id          =  $request->grade_id;
                    $teachers-> specialization_id =  $request->specialization_id;
                    $teachers-> joining_date      =  now();
                    $teachers-> status            =  1;
                    // save grade
                    $teachers->save();
                    DB::commit();
                    // alert and redirect to grades table 
                    Alert::success(trans('msg.success'), trans('msg.add'));
                    return redirect()->route('teachers.index');
                }
                catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }

    }

    // Delete Section
    public function destroyTeacher($id)
    {
        // destory teacher by id and alert
        if(Teacher::destroy($id)){
            Alert::success(trans('msg.success'), trans('msg.delete'));
            return redirect()->back();
        }else{
            Alert::error(trans('msg.error'));
            return redirect()->back();
        }
    }
}