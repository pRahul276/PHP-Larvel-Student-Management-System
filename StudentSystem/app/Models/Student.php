<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'classroom_id',
    ];

    /**
     * A student belongs to a classroom.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom() 
    {
        return $this->belongsTo(Classroom::class);
    }
}
