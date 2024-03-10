<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nationality extends Model
{
    use HasTranslations;
    public    $translatable =   ['name'];
    protected $fillable     =   ['name'];
    protected $table        =   'nationalities';
    public    $timestamps   =   true;

    public function studentParents( ){
        return $this->hasMany(StudentParent::class);
    }

    
    public function students( ){
        return $this->hasMany(Section::class);
    }
}
