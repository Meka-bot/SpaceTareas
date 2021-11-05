<div class="card mb-3" style="background-color:rgb(1,0,0,0); border-color:rgb(237,95,74,255); color:white;">
	@if($project->status == 'En Proceso')
	<div class="text-white px-2 text-center bg-info">{{ $project->status }}</div>
	@endif

	@if($project->status == 'Terminado')
	<div class="text-white px-2 text-center bg-success">{{ $project->status }}</div>
	@endif

	@if($project->status == 'Atrasado')
	<div class="text-white px-2 text-center bg-warning">{{ $project->status }}</div>
	@endif

	@if($project->status == 'Cancelado')
	<div class="text-white px-2 text-center bg-danger">{{ $project->status }}</div>
	@endif

	<div class="card-body" style="background-color:rgb(1,0,0,0); border-color:rgb(237,95,74,255); color:white;">
		<h5 style="font-weight:700;">{{ $project->name }}</h5>
		<p>{{ $project->description }}</p>
		<hr style="background-color:rgb(1,0,0,0); border-color:rgb(237,95,74,255); color:white;">
		<a href="{{ route('tareas.create') }}" class="btn btn-outline-primary btn-sm mb-3">Crear Tarea</a>
		<br>
		<h15 style="font-weight:600;">Soldados asignados al Proyecto:</h15>
		@foreach($project->users as $user)
			<p class="mb-0">{{  $users->name  }}</p>
			<hr style="border-color:rgb(237,95,74,255); width:70%; text-align:left; margin-left:0">
			
		@endforeach
		<hr style="border-color:rgb(237,95,74,255); width:100%; text-align:left; margin-left:0">
		<h15 style="font-weight:600;">Tareas de Proyecto:</h15>
		@foreach($project->tasks as $task)
			<p class="mb-0">{{ $task->name }}</p>
			<p>Terminar para: {{ $task->deadline }}</p>
			<hr style="border-color:rgb(237,95,74,255); width:70%; text-align:left; margin-left:0">

		@endforeach
		
		<p>Proyecto Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>
	</div>
</div>
