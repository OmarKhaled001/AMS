<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasTranslations;

    public    $translatable =   ['name'];
    protected $fillable     =   ['name' ,'status','grade_id','classroom_id'];
    protected $table        =   'sections';
    public    $timestamps   =   true;

    public function grade( ){
        return $this->belongsTo(Grade::class);
    }

    public function classroom( ){
        return $this->belongsTo(Classroom::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }

    
    public function students( ){
        return $this->hasMany(Section::class);
    }

}
