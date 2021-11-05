@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-left">
			<a href="{{ route('proyectos.create') }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalProyectos">Crear Nuevo Proyecto</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h4>Mis proyectos</h4>
			<hr>
		</div>
		@foreach($projects as $project)
		<div class="col-md-4">
			@include('projects.utilities._project_card')
		</div>
		@endforeach
	</div>
</div>



@endsection