<!-- app/views/home.blade.php -->

@extends('layouts.base')

@section('body')

<button class="btn btn-info" data-target="#create" data-toggle="modal">Create New Task</button>

<h2>Your Open Tasks</h2>

@if ($tasks->isEmpty())
	<p>No tasks - click the create button above to get started.</p>
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
						<a href="{{ action('TasksController@completed') }}">
						<span class="glyphicon glyphicon-unchecked blue"></span>
						</a>
					</td>
					<td>{{{ $task->taskname }}}</td>
					<td>{{{ $task->created_at }}}</td>
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



<!--
	<span class="glyphicon glyphicon-ok blue"</span>
-->

@stop
