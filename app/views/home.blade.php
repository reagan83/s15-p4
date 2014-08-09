@extends('layouts.base')

@section('body')

<button class="btn btn-info" data-target="#create" data-toggle="modal">Create New Task</button>

<h2>Your Open Tasks</h2>

@if(Session::get('flash_errors'))
    <div class="alert alert-info" role="alert">{{ Session::get('flash_errors') }}</div>
    <script>
        window.setTimeout(function() { $(".alert").alert('close'); }, 1800);
    </script>
@endif


@if ($tasks->isEmpty())
	<p>No tasks - click the create button above to get started.</p>
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
					<td>{{{ $task->created_at }}}</td>
					<td>

						@include('layouts.edittask')

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
