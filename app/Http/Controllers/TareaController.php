<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Tarea::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('TareasComponent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nota = new Tarea();
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->principal = false;
        $nota->user_id = auth()->id();
        $nota->save();

        return $nota;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nota = Tarea::find($id);
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->save();
        return $nota;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Tarea::find($id);
        $nota->delete();
    }

    public function principal($id)
    {  

        $nota = Tarea::find($id);

        if(!$nota->principal){

            $tareas = array();

            $tareaAnterior = Tarea::where('principal', true)->first();
            $tareaAnterior->principal = false;
            $tareaAnterior->save();
            $tareas[0] = $tareaAnterior;

            $nota->principal= true;
            $nota->save();
            $tareas[1] = $nota;

            return $tareas;
        } 
        else return $nota;
        



        
    }
}
