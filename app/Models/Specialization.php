<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasTranslations;
    public    $translatable =   ['name'];
    protected $fillable     =   ['name'];
    protected $table        =   'specializations';
    public    $timestamps   =   true;

    public function teachers( ){
        return $this->hasMany(Teacher::class);
    }
}
