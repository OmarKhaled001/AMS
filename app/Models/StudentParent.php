<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentParent extends Model 
{
    use HasTranslations;

    public $translatable =
        [
            'name_father',
            'name_mother',
            'job_father',
            'job_mother',
            'address_father',
            'address_mother'
        ];

    protected $fillable =
        [
            'email',
            'password',
            // Father
            'name_father',
            'job_father',
            'phone_father',
            'address_father',
            'national_id_father',
            'passport_id_father',
            'religion_father_id',
            'blood_type_father_id',
            'nationality_father_id',
            // Mother
            'name_mother',
            'job_mother',
            'phone_mother',
            'address_mother',
            'national_id_mother',
            'passport_id_mother', 
            'religion_mother_id',
            'blood_type_mother_id',
            'nationality_mother_id'
        ];

    protected $table   = 'student_parents';

    public $timestamps = true;

    public function religion( ){
        return $this->belongsTo(Religion::class);
    }

    public function bloodType( ){
        return $this->belongsTo(BloodType::class);
    }

    public function nationality( ){
        return $this->belongsTo(Nationality::class);
    }

    
    public function students( ){
        return $this->hasMany(Section::class);
    }

}
