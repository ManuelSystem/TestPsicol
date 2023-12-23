<?php

namespace App\Http\Controllers;

use DB;
use Inertia\Inertia;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\SubjectForStudent;
use App\Rules\UniqueSubjectForStudent;

class SubjectForStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = SubjectForStudent::with('student', 'teacher', 'subject')->get();

        return Inertia::render('Groups/Index', ['groups' => $groups ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::get(['id', 'name', 'subject_credits']);
        $students = Student::get(['id', 'name']);
        $teachers = Teacher::get(['id', 'name']);

        return Inertia::render('Groups/Create', [
            'subjects' => $subjects,'students' => $students,'teachers' => $teachers,
            'errors' => session('errors') ? session('errors')->getBag('default')->toArray() : (object)[],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        DB::transaction(function () use ($request) {
            $request->validate([
                'student_id' => ['required', new UniqueSubjectForStudent($request->teacher_id, $request->subject_id)],
                'teacher_id' => 'required',
                'subject_id' => 'required',
            ]);

            $groups = new SubjectForStudent($request->input());
            $groups->save();
        }, 10);
        return redirect('grupos');
    }

    public function ReportByStudents(){
        $resultByStudents =  SubjectForStudent::with('subject')
        ->select('subjects.name as nombre_subject', DB::raw('count(student_id) as count'))
        ->join('subjects', 'subject_for_students.subject_id', '=', 'subjects.id')
        ->groupBy('subjects.name')
        ->get();

        $resultByTeachers=  SubjectForStudent::with('teacher')
        ->select('subjects.name as nombre_subject', DB::raw('count(teacher_id) as count'))
        ->join('subjects', 'subject_for_students.subject_id', '=', 'subjects.id')
        ->groupBy('subjects.name')
        ->get();
        
        return Inertia::render('Reports/Index',['data' => $resultByStudents, 'data2' => $resultByTeachers]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectForStudent  $subjectForStudent
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectForStudent $subjectForStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectForStudent  $subjectForStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectForStudent $subjectForStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectForStudent  $subjectForStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectForStudent $subjectForStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectForStudent  $subjectForStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectForStudent $grupo)
    {
        $grupo->delete();
        return redirect('grupos');
    }
}
