<!-- app/views/alltasks.blade.php -->

@extends('layouts.base')

@section('body')

<button class="btn btn-info" data-target="#create" data-toggle="modal">Create New Task</button>

<h2>All Tasks</h2>

@if ($tasks->isEmpty())
	<p>No tasks! Go create some!</p>
@else
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Complete?</td>
				<td>Task</td>
				<td>Created</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td>
						@if ($task->completed == "1")
							<a href=""><span class="glyphicon glyphicon-ok blue"></span></a>
						@else
							<a href=""><span class="glyphicon glyphicon-unchecked blue"></span></a>
						@endif

					</td>
					<td>{{{ $task->taskname }}}</td>
					<td>{{{ $task->created_at }}}</td>
					<td>

						@include('layouts.edittask')

					</td>

				</tr>
			@endforeach
		</tbody>

	</table>

@endif



@stop
