<!-- app/views/tasks.blade.php -->

@extends('layouts.base')

@section('body')

<h2>Completed Tasks</h2>

@if ($tasks->isEmpty())
	<p>No tasks - click the create button above to get started.</p>
@else
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Complete?</td>
				<td>Task</td>
				<td>Created</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td>
						<a href=""><span class="glyphicon glyphicon-unchecked blue"></span></a>
						<span class="glyphicon glyphicon-ok blue"></span>
					</td>
					<td>{{{ $task->taskname }}}</td>
					<td>{{{ $task->created_at }}}</td>
				</tr>
			@endforeach
		</tbody>

	</table>

@endif



@stop
