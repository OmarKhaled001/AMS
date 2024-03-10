<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasTranslations;

    public    $translatable =   ['name','address'];
    protected $fillable     =   ['name' ,'address','email','password','phone','grade_id','specialization_id','joining_date','status'];
    protected $table        =   'teachers';
    public    $timestamps   =   true;

    public function specialization( ){
        return $this->belongsTo(Specialization::class);
    }

    public function grade( ){
        return $this->belongsTo(Grade::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
}
