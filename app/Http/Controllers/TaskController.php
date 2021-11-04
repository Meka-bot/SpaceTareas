<?php

namespace App\Http\Controllers;

use Session; 

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index')->with('tasks', $tasks);

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task;

        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->status = $request->status;

        $task->save();

       // Session::flash('exito', 'Se guardó correctamente tu tarea.');

       return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task = Task::find($id);



        Session::flash('info', 'Estas en la vista de editar cadete. Ten cuidado con lo que haces ya que no se puede modificar.');

        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $project->status = $request->status;

        $task->save();

        Session::flash('info', 'Tu tarea fue editada correctamente. Un teniente se reportara contigo para confirmar el cambio');

        return redirect()->route('tareas.index');
    }

    public function status($id)
    {
        $task = Task::find($id);
        $task->is_complete = true;
        $task->save();

        Session::flash('info', 'Tarea completada. Sigue así cadete.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        Session::flash('alert', 'Se eliminó la tarea de tu sistema cadete, espermos que no haya sido un error');

        return redirect()->back();
    }
}












