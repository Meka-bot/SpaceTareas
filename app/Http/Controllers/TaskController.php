<?php

namespace App\Http\Controllers;

use Session; 

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
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

        $users = User::all();

        $projects = Project::all();

        return view('tasks.index')->with('tasks', $tasks)->with('users', $users)->with('projects', $projects);

    }

    public function create()
    {
        $projects = Project::all();

        $users = User::all();

        return view('tasks.create')->with('users', $users)->with('projects', $projects);
    }

    public function store(Request $request)
    {
        $task = new Task;
        $projects = Project::all();

        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->project_id = $request->project_id;
        $task->user_id = $request->user_id;
        
        $task->user_id_name = 

        $task->save();

        $users = User::all();

       // Session::flash('exito', 'Se guardó correctamente tu tarea.');

       if($request->source == 'proyectos'){
        return redirect()->route('proyectos.index')->with('users', $users);
        }else{
        return redirect()->route('tareas.index'); 
     }
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
        $task->status = $request->status;
        $task->user_id = $request->user_id;
      

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












