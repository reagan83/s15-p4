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
						<a href=""><span class="glyphicon glyphicon-ok blue"></span></a>
					</td>
					<td>{{{ $task->taskname }}}</td>
					<td>{{{ $task->created_at }}}</a>
					</td>
					<td>
						<a class="open-editshowitemdialog" data-toggle="modal" data-target="#edit" data-id="{{{ $task->id }}}" data-taskname="{{{ $task->taskname }}}" data-tasknotes="{{{ $task->notes }}}" href="#">
							Modify
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

@endif



@stop
