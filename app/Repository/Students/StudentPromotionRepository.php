<?php

namespace App\Repository\Students;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\StudentParent;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Interface\Students\StudentPromotionRepositoryInterface;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function allPromotion()
    {
        // get all promotions
        $promotions = Promotion::all();
        // return view with data
        return view('pages.students.promotions.all',compact('promotions'));
    }

    public function addForm()
    {
        // get all grades
        $grades = Grade::all();
        // return view with data
        return view('pages.students.promotions.add',compact('grades'));
    }


}
