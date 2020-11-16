<?php

namespace App\Models;
use App\Models\Classroom;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name',
//    ];

    /**
     * A school may have many classrooms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classrooms()//: HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}

