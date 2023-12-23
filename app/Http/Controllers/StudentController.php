<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        
        return Inertia::render('Students/Index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Septimo', 'Octavo', 'Noveno', 'Décimo'];
        return Inertia::render('Students/Create', ['semesters'=>$semesters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $request->validate([
                'document' => 'required|max:10',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:students,email',
                'address' => 'required',
                'city' => 'required',
                'semester' => 'required',
            ]);

            $student = new Student($request->input());
            $student->save();
        }, 10);
        return redirect('estudiantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $estudiante)
    {
        $semesters = ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Septimo', 'Octavo', 'Noveno', 'Décimo'];
        return Inertia::render('Students/Edit', ['student' => $estudiante, 'semesters' => $semesters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $estudiante)
    {
        $request->validate([
            'document' => 'required|max:10',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'semester' => 'required',
        ]);

        $estudiante->update($request->all());
        return redirect('estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $estudiante)
    {
        
        try {
            $estudiante->delete();
            return redirect('estudiantes');
        } catch (\Exception $e) {
            // Manejar la excepción
            return abort(403, 'No se puede eliminar el estudiante asociado a un docente y a una asignatura.');
        }
    }
}
