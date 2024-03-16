<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Student extends Model implements HasMedia
{
    use HasTranslations , InteractsWithMedia;

    public $translatable =['name'];

    protected $fillable =
        [
            'name',
            'email',
            'password',
            'phone',
            'birthdate',
            'gender',
            'academic_year',
            'religion_id',
            'blood_type_id',
            'nationality_id',
            'grade_id',
            'classroom_id',
            'section_id',
            'parent_id',
    ];

    protected $table   = 'students';
    
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

    public function grade( ){
        return $this->belongsTo(Grade::class);
    }

    public function classroom( ){
        return $this->belongsTo(Classroom::class);
    }

    public function section( ){
        return $this->belongsTo(Section::class);
    }

    public function parent( ){
        return $this->belongsTo(StudentParent::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 50, 30)
            ->nonQueued();
    }



}
