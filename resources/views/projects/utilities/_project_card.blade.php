<div class="card mb-3">
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

	<div class="card-body">
		<h5>{{ $project->name }}</h5>
		<p>{{ $project->description }}</p>
		<hr>
		<a href="" class="btn btn-outline-dark btn-sm mb-3">Crear Tarea</a>

		@foreach($project->tasks as $task)
			<p class="mb-0">{{ $task->name }}</p>
			<p>Terminar para: {{ $task->deadline }}</p>
		@endforeach
		<hr>
		
		<p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</p>
		<p>Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>
	</div>
</div>
