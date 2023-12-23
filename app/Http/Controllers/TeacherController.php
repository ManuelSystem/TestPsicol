<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return Inertia::render('Teachers/Index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Teachers/Create');
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
                'email' => 'required|email|unique:teachers,email',
                'address' => 'required',
                'city' => 'required',
            ]);

            $teacher = new Teacher($request->input());
            $teacher->save();
        }, 10);
        return redirect('profesores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $profesore)
    {
        return Inertia::render('Teachers/Edit', ['teacher'=>$profesore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $profesore)
    {
        $request->validate([
            'document' => 'required|max:10',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:students,email',
            'address' => 'required',
            'city' => 'required',
        ]);
        
        $profesore->update($request->all());
        return redirect('profesores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $profesore)
    {
        try {
            $profesore->delete();
            return redirect('profesores');
        } catch (\Exception $e) {
            // Manejar la excepción
            return abort(403, 'No se puede eliminar el profesor asociado a una asignación.');
        }
    }
}
