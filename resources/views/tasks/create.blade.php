@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<div class="card" style="background-color:rgb(1,0,0,0); border-color:rgb(237,95,74,255); color:white;">
    			<div class="card-header" style="background-color:rgb(1,0,0,0); border-color:rgb(237,95,74,255); color:white;">CREAR TAREA</div>

    			<div class="card-body">
    				<form method="POST" action="{{ route('tareas.store') }}">
    					{{ csrf_field() }}
    					
    					<div class="form-group">
    						<label>Titulo de Tarea</label>
    						<input type="text" name="name" class="form-control" required="">
    					</div>

						<div class="form-group">
    						<label>Vincular Proyecto</label>
							<select class="form-control" id="exampleFormControlSelect1" name="project_id">
				    		@foreach($projects as $project)
				      		<option value="{{ $project->id }}">{{ $project->name }}</option>
				        	@endforeach
				    	</select>
    					</div>

						<div class="form-group">
    						<label>Fecha de Entrega</label>
    						<input type="date" name="deadline" class="form-control">
    					</div>

    					<div class="form-group">
    						<label>Descripción</label>
    						<textarea class="form-control" name="description" rows="5"></textarea>
    					</div>

						<div class="form-group">
				    	<label for="exampleFormControlSelect1">Soldados asignados a la tarea</label>
				    	<select class="form-control" id="exampleFormControlSelect1" name="user_id" multipple="">
				    	@foreach($users as $user)
				     	 <option value="{{ $user->id }}">{{ $user->name }}</option>
				        @endforeach
				    	</select>

						<div class="form-group">
	      				<label>Estado</label>
	      				<select class="form-control" name="status">
	      					<option value="En Proceso">En Proceso</option>
	      					<option value="Terminado">Terminado</option>
	      					<option value="Atrasado">Atrasado</option>
	      					<option value="Cancelado">Cancelado</option>
	      				</select>
	      				</div>

    					<button type="submit" class="btn btn-outline-primary">Guardar tarea</button>
						<a href="{{ route('tareas.index') }}" class="btn btn-outline-danger">Cancelar</a>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection