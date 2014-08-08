<a class="open-editshowitemdialog" 
	data-toggle="modal" 
	data-target="#edit" 
	data-id="{{{ $task->id }}}" 
	data-taskname="{{{ $task->taskname }}}" 
	data-tasknotes="{{{ $task->notes }}}" 
	data-createddate="{{{ $task->created_at }}}" 
	data-completeddate="{{{ $task->updated_at }}}" 
	data-completed="{{{ $task->completed }}}" 
	href="#">
	Modify
</a>
