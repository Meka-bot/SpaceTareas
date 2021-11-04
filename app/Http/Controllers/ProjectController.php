<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index')->with('projects', $projects);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {

        $project = new Project;

        $project->name = $request->name;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->status = $request->status;

        $project->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task = Project::find($id);

        Session::flash('info', 'Estas en la vista de editar cadete. Ten cuidado con lo que haces ya que no se puede modificar.');

        return view('proyecto.edit')->with('project', $task);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        $project->name = $request->name;
        $project->deadline = $request->deadline;
        $project->description = $request->description;
        $project->status = $request->status;

        $project->save();

        Session::flash('info', 'Tu proyecto fue editado correctamente. Un teniente se reportara contigo para confirmar el cambio');

        return redirect()->route('proyectos.index');
    }
    public function destroy($id)
    {
        //
    }
}
