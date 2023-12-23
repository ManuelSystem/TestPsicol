<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return Inertia::render('Subjects/Index', ['subjects' => $subjects]);
    }

    public function create()
    {
        $booleanelective = [
            ['label' => 'No', 'value' => 1],
            ['label' => 'Si', 'value' => 0],
        ];
        return Inertia::render('Subjects/Create', ['booleanelective' => $booleanelective]);
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
                'name' => 'required',
                'area' => 'required',
                'description' => 'required|max:800',
                'subject_credits' => 'required',
                'elective' => 'required',
            ]);

            $subject = new Subject($request->input());
            $subject->save();
        }, 10);
        return redirect('asignaturas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $asignatura)
    {
        $booleanelective = [
            ['label' => 'No', 'value' => 1],
            ['label' => 'Si', 'value' => 0],
        ];
        return Inertia::render('Subjects/Edit', ['subject'=>$asignatura, 'booleanelective' => $booleanelective]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $asignatura)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',
            'description' => 'required|max:800',
            'subject_credits' => 'required',
            'elective' => 'required',
        ]);

        $asignatura->update($request->all());
        return redirect('asignaturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $asignatura)
    {
        try {
            $asignatura->delete();
            return redirect('asignaturas');
        } catch (\Exception $e) {
            // Manejar la excepción
            return abort(403, 'No se puede eliminar la asignatura asociado a un estudiante.');
        }
    }
}
