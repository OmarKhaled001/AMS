<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;

    public    $translatable =   ['name'];
    protected $fillable     =   ['name'];
    protected $table        =   'classrooms';
    public    $timestamps   =   true;

    public function grade( ){
        return $this->belongsTo(Grade::class);
    }

    public function sections( ){
        return $this->hasMany(Section::class);
    }

    
    public function students( ){
        return $this->hasMany(Section::class);
    }
}
