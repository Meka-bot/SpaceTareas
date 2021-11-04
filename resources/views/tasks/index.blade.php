@extends('layouts.app')

@section('content')
<!--Tareas-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-color:rgb(1,0,0,0); border-color:rgb(237,95,74,255); color:white;">
                <div class="card-header">MIS TAREAS</div>

                <div class="card-body">
                    <a href="{{ route('tareas.create') }}" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#modalTareas">Crear Nueva Tarea</a>

                	<table class="table table-sm" style="color:white;">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Fecha de Entrega</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tasks as $task)
                          <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                              @if($task->status == 'En Proceso')
                              <span class="badge badge-secondary">En Proceso</span>
                              @endif
                              @if($task->status == 'Terminado')
                              <span class="badge badge-success">Terminado</span>
                              @endif
                              @if($task->status == 'Atrasado')
                              <span class="badge badge-danger">Atrasado</span>
                              @endif
                              @if($task->status == 'Cancelado')
                              <span class="badge badge-dark">Cancelado</span>
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('tareas.edit', $task->id) }}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">Editar<ion-icon name="create-outline"></ion-icon></a>

                              <form method="POST" style="display: inline-block;" action="{{ route('tareas.destroy', $task->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Borrar" class="btn btn-outline-danger btn-sm"><ion-icon name="trash-outline">Eliminar</ion-icon></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('tasks.utilities._create_task_modal')

@endsection
