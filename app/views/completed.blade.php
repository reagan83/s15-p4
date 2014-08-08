<!-- app/views/completed.blade.php -->

@extends('layouts.base')

@section('body')

<button class="btn btn-info" data-target="#create" data-toggle="modal">Create New Task</button>

<h2>Completed Tasks</h2>

@if ($tasks->isEmpty())
	<p>No completed tasks! Get to work!</p>
@else
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Task</td>
				<td>Created</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td>{{{ $task->taskname }}}</td>
					<td>{{{ $task->created_at }}}</a>
					</td>
					<td>

						@include('layouts.edittask')

					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

@endif



@stop
