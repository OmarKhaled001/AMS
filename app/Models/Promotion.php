<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'from_grade_id',
            'to_grade_id',
            'from_classroom_id',
            'to_classroom_id',
            'from_section_id',
            'to_section_id',
            'academic_year',
            'academic_year_new',
    ];

    protected $table   = 'promotions';
    
    public $timestamps = true;

    public function grade( ){
        return $this->belongsTo(Grade::class);
    }

    public function classroom( ){
        return $this->belongsTo(Classroom::class);
    }

    public function section( ){
        return $this->belongsTo(Section::class);
    }
}
