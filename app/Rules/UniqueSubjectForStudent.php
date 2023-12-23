<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\SubjectForStudent;

class UniqueSubjectForStudent implements Rule
{
    protected $teacherId;
    protected $subjectId;

    public function __construct($teacherId, $subjectId)
    {
        $this->teacherId = $teacherId;
        $this->subjectId = $subjectId;
    }

    public function passes($attribute, $value)
    {
        
    $studentId = request()->input('student_id');
    $subjectId = request()->input('subject_id');
        // Verificar si ya existe una relación con el mismo estudiante y asignatura
        return !SubjectForStudent::where('student_id', $studentId)
            ->where('subject_id', $subjectId)
            ->exists();
    }

    public function message()
    {
        return 'Esta materia ya fue matriculada con otro profesor.';
    }
}
