<?php

namespace App\Repository\Students;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Religion;
use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Nationality;
use App\Models\StudentParent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Interface\Students\StudentRepositoryInterface;
use App\Models\Section;

class StudentRepository implements StudentRepositoryInterface
{
    public function allStudent()
    {
        $students = Student::all();
        return view('pages.students.all',compact('students'));
    }

    public function addForm()
    {
        $nationalities = Nationality::all();
        $bloodTypes    = BloodType::all();
        $religions     = Religion::all();
        $parents       = StudentParent::all();
        $grades        = Grade::all();
        return view('pages.students.add',compact('grades','parents','nationalities','bloodTypes','religions'));
    }

    public function editForm($id)
    {
        $student       = Student::find($id);
        $grades        = Grade::all();
        $parents       = StudentParent::all();
        $religions     = Religion::all();
        $bloodTypes    = BloodType::all();
        $nationalities = Nationality::all();
        return view('pages.students.edit',compact('student','grades','parents','nationalities','bloodTypes','religions'));
    }


    public function createStudent($request)
    { 
    // check date valid or no
    $request->validate([
        'name' => 'required|max:255',
        'name_en' => 'required|max:255',
        'birthdate' => 'required',
        'gender' => 'required',
        'religion' => 'required',
        'blood_type' => 'required',
        'nationality' => 'required',
        'grade_id' => 'required',
        'classroom_id' => 'required',
        'section_id' => 'required',
        'parent_id' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'password' => 'required',

    ]);
    DB::beginTransaction();
    try {
        // create grade by request
        $students = new Student();
        $students-> name           =  ['en' => $request->name_en, 'ar' => $request->name];
        $students-> phone          =  $request->phone;
        $students-> email          =  $request->email;
        $students-> password       =  Hash::make($request->password);
        $students-> birthdate      =  $request->birthdate;
        $students-> grade_id       =  $request->grade_id;
        $students-> classroom_id   =  $request->classroom_id;
        $students-> section_id     =  $request->section_id;
        $students-> parent_id      =  $request->parent_id;
        $students-> gender         =  $request->gender;
        $students-> nationality    =  $request->nationality;
        $students-> religion       =  $request->religion;
        $students-> blood_type     =  $request->blood_type;
        $students-> academic_year  =  $request->academic_year;
        // save grade
        $students->save();
        DB::commit();
        // alert and redirect to grades table 
        Alert::success(trans('msg.success'), trans('msg.add'));
        return redirect()->route('students.index');
    }
    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }



    public function updateStudent($request)
    {

        // check date valid or no
    $request->validate([
        'name'         => 'required|max:255',
        'birthdate'    => 'required',
        'gender'       => 'required',
        'religion'     => 'required',
        'blood_type'   => 'required',
        'nationality'  => 'required',
        'grade_id'     => 'required',
        'classroom_id' => 'required',
        'section_id'   => 'required',
        'parent_id'    => 'required',
        'phone'        => 'required',
        'email'        => 'required|email',

    ]);
    DB::beginTransaction($request);
    try {
        // create grade by request
        $student = Student::find($request->id);
        $student-> name           =  $request->name;
        $student-> phone          =  $request->phone;
        $student-> email          =  $request->email;
        $student-> birthdate      =  $request->birthdate;
        $student-> grade_id       =  $request->grade_id;
        $student-> classroom_id   =  $request->classroom_id;
        $student-> section_id     =  $request->section_id;
        $student-> parent_id      =  $request->parent_id;
        $student-> gender         =  $request->gender;
        $student-> nationality    =  $request->nationality;
        $student-> religion       =  $request->religion;
        $student-> blood_type     =  $request->blood_type;
        $student-> academic_year  =  $request->academic_year;
        // save grade
        $student->save();
        DB::commit();
        // alert and redirect to grades table 
        Alert::success(trans('msg.success'), trans('msg.add'));
        return redirect()->route('students.index');
    }
    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


    }


    public function destroyStudent($id)
    {
        // destory grade by id and alert
        if(Student::destroy($id)){
            Alert::success(trans('msg.success'), trans('msg.delete'));
            return redirect()->back();
        }else{
            Alert::error(trans('msg.error'));
            return redirect()->back();
        }
    }
}
