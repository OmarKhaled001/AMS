<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasTranslations;

    public    $translatable =   ['name','notes'];
    protected $fillable     =   ['name','notes'];
    protected $table        =   'grades';
    public    $timestamps   =   true;

    public function classrooms( ){
        return $this->hasMany(ClassRoom::class);
    }

    public function sections( ){
        return $this->hasMany(Section::class);
    }

    public function students( ){
        return $this->hasMany(Section::class);
    }

    
}
