<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Religion;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AddParent extends Component
{
    public $catchError,
    $updateMode = false,
    $show_table = true,
    $parent_id;


    public $currentStep = 1,
        // Father
        $email, $password,
        $name_father, $name_father_en,
        $national_id_father, $passport_id_father,
        $phone_father, $job_father, $job_father_en,
        $nationality_father_id, $blood_type_father_id,
        $address_father,$address_father_en, $religion_father_id,
        $profile_father,$card_father,
        // Mother
        $name_mother, $name_mother_en,
        $national_id_mother, $passport_id_mother,
        $phone_mother, $job_mother, $job_mother_en,
        $nationality_mother_id , $blood_type_mother_id,
        $address_mother,$address_mother_en, $religion_mother_id,
        $profile_mother,$card_mother;

    // Get Date and Retunt View
    public function render()
    {
        return view('livewire.parents.add-parent',[
            'nationalities' => Nationality::all(),
            'bloodTypes' => BloodType::all(),
            'religions' => Religion::all(),
            'parents' => StudentParent::all()
        ]);
    }
    
    public function showFormAdd(){
        $this->show_table = false;
    }

    // Step 1 & Validate
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:student_parents,email,'.$this->id,
            'password' => 'required',
            'name_father' => 'required',
            'name_father_en' => 'required',
            'job_father' => 'required',
            'job_father_en' => 'required',
            'national_id_father' => 'required|unique:student_parents,national_id_father,' . $this->id,
            'passport_id_father' => 'required|unique:student_parents,passport_id_father,' . $this->id,
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => 'required',
            'blood_type_father_id' => 'required',
            'religion_father_id' => 'required',
            'address_father' => 'required',
            'address_father_en' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //Step 2 & Validate
    public function secondStepSubmit()
    {
        $this->validate([
            'name_mother' => 'required',
            'name_mother_en' => 'required',
            'job_mother' => 'required',
            'job_mother_en' => 'required',
            'national_id_mother' => 'required|unique:student_parents,national_id_mother,' . $this->id,
            'passport_id_mother' => 'required|unique:student_parents,passport_id_mother,' . $this->id,
            'phone_mother' => 'required',
            'nationality_mother_id' => 'required',
            'blood_type_mother_id' => 'required',
            'religion_mother_id' => 'required',
            'address_mother' => 'required',
            'address_mother_en' => 'required',
        ]);
        $this->currentStep = 3;
    }

    // Create Parents
    public function submitForm(){
        try {
            $StudentParent = new StudentParent();
            $StudentParent->email                  =  $this->email;
            $StudentParent->password               =  Hash::make($this->password);
            // Step 1 (Father)
            $StudentParent->name_father            =  ['en' => $this->name_father_en, 'ar' => $this->name_father];
            $StudentParent->job_father             =  ['en' => $this->job_father_en, 'ar' => $this->job_father];
            $StudentParent->phone_father           =  $this->phone_father;
            $StudentParent->address_father         =  ['en' => $this->address_father_en, 'ar' => $this->address_father];
            $StudentParent->national_id_father     =  $this->national_id_father;
            $StudentParent->passport_id_father     =  $this->passport_id_father;
            $StudentParent->religion_father_id     =  $this->religion_father_id;
            $StudentParent->blood_type_father_id   =  $this->blood_type_father_id;
            $StudentParent->nationality_father_id  =  $this->nationality_father_id;
            // Step 2 (Mother)
            $StudentParent->name_mother             = ['en' => $this->name_mother_en, 'ar' => $this->name_mother];
            $StudentParent->job_mother              = ['en' => $this->job_mother_en, 'ar' => $this->job_mother];
            $StudentParent->phone_mother            = $this->phone_mother;
            $StudentParent->address_mother          = ['en' => $this->address_mother_en, 'ar' => $this->address_mother];
            $StudentParent->national_id_mother      = $this->national_id_mother;
            $StudentParent->passport_id_mother      = $this->passport_id_mother;
            $StudentParent->religion_mother_id      = $this->religion_mother_id;
            $StudentParent->blood_type_mother_id    = $this->blood_type_mother_id;
            $StudentParent->nationality_mother_id   = $this->nationality_mother_id;
            $StudentParent->save();

            // alert and redirect to parents table 
            Alert::success(trans('msg.success'), trans('msg.add'));
            return redirect()->route('parents.add');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Show Parents
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $StudentParent = StudentParent::where('id',$id)->first();
        $this->parent_id              =  $id;
        $this->email                  =  $StudentParent->email;
        $this->password               =  $StudentParent->password ;
        // Step 1 (Father)
        $this->name_father            =  $StudentParent->getTranslation('name_father', 'ar');
        $this->name_father_en         =  $StudentParent->getTranslation('name_father', 'en');
        $this->job_father             =  $StudentParent->getTranslation('job_father', 'ar');;
        $this->job_father_en          =  $StudentParent->getTranslation('job_father', 'en');
        $this->national_id_father     =  $StudentParent->national_id_father;
        $this->passport_id_father     =  $StudentParent->passport_id_father;
        $this->phone_father           =  $StudentParent->phone_father;
        $this->nationality_father_id  =  $StudentParent->nationality_father_id;
        $this->blood_type_father_id   =  $StudentParent->blood_type_father_id;
        $this->religion_father_id     =  $StudentParent->religion_father_id;
        $this->address_father         =  $StudentParent->getTranslation('address_father', 'ar');
        $this->address_father_en      =  $StudentParent->getTranslation('address_father', 'en');
        // Step 2 (Mother)
        $this->name_mother            =  $StudentParent->getTranslation('name_mother', 'ar');
        $this->name_mother            =  $StudentParent->getTranslation('name_mother', 'en');
        $this->job_mother             =  $StudentParent->getTranslation('job_mother', 'ar');;
        $this->job_mother_en          =  $StudentParent->getTranslation('job_mother', 'en');
        $this->national_id_mother     =  $StudentParent->national_id_mother;
        $this->passport_id_mother     =  $StudentParent->passport_id_mother;
        $this->phone_mother           =  $StudentParent->phone_mother;
        $this->nationality_mother_id  =  $StudentParent->nationality_mother_id;
        $this->blood_type_mother_id   =  $StudentParent->blood_type_mother_id;
        $this->religion_mother_id     =  $StudentParent->religion_mother_id;
        $this->address_mother         =  $StudentParent->getTranslation('address_mother', 'ar');
        $this->address_mother_en      =  $StudentParent->getTranslation('address_mother', 'en');
    }

    //firstStepSubmit
    public function firstStepSubmitEdit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    //secondStepSubmit_edit
    public function secondStepSubmitEdit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    // Update Parents
    public function submitFormEdit(){
        if ($this->parent_id){
            $StudentParent = StudentParent::find($this->parent_id);
            $StudentParent->email                  =  $this->email;
            $StudentParent->password               =  Hash::make($this->password);
            // Step 1 (Father)
            $StudentParent->name_father            =  ['en' => $this->name_father_en, 'ar' => $this->name_father];
            $StudentParent->job_father             =  ['en' => $this->job_father_en, 'ar' => $this->job_father];
            $StudentParent->phone_father           =  $this->phone_father;
            $StudentParent->address_father         =  ['en' => $this->address_father_en, 'ar' => $this->address_father];
            $StudentParent->national_id_father     =  $this->national_id_father;
            $StudentParent->passport_id_father     =  $this->passport_id_father;
            $StudentParent->religion_father_id     =  $this->religion_father_id;
            $StudentParent->blood_type_father_id   =  $this->blood_type_father_id;
            $StudentParent->nationality_father_id  =  $this->nationality_father_id;
            // Step 2 (Mother)
            $StudentParent->name_mother             = ['en' => $this->name_mother_en, 'ar' => $this->name_mother];
            $StudentParent->job_mother              = ['en' => $this->job_mother_en, 'ar' => $this->job_mother];
            $StudentParent->phone_mother            = $this->phone_mother;
            $StudentParent->address_mother          = ['en' => $this->address_mother_en, 'ar' => $this->address_mother];
            $StudentParent->national_id_mother      = $this->national_id_mother;
            $StudentParent->passport_id_mother      = $this->passport_id_mother;
            $StudentParent->religion_mother_id      = $this->religion_mother_id;
            $StudentParent->blood_type_mother_id    = $this->blood_type_mother_id;
            $StudentParent->nationality_mother_id   = $this->nationality_mother_id;
            $StudentParent->save();
        }
        // alert and redirect to parents table 
        Alert::success(trans('msg.success'), trans('msg.add'));
        return redirect()->route('parents.add');
    }

    public function delete($id){
         // destory parent by id and alert
        if(StudentParent::destroy($id)){
            Alert::success(trans('msg.success'), trans('msg.delete'));
            return redirect()->route('parents.add');
        }else{
            Alert::error(trans('msg.error'));
            return redirect()->back();
        }
    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
