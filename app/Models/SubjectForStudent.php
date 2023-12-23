<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectForStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'subject_id',
    ];

    public function student()
    {
        return $this->hasMany('App\Models\Student', 'id', 'student_id');
    }

    public function teacher()
    {
        return $this->hasMany('App\Models\Teacher', 'id', 'teacher_id');
    }

    public function subject()
    {
        return $this->hasMany('App\Models\Subject', 'id', 'subject_id');
    }
}
