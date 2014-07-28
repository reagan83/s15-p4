<?php

// app/controllers/TasksController.php

class TasksController extends BaseController
{
    public function index()
    {
        // Show a listing of tasks.
        $tasks = Task::all();
        return View::make('home', compact('tasks'));
    }

    public function completed()
    {
        // Show the edit task form.
        return View::make('tasks');
    }

    public function logout()
    {
        // Show the edit task form.
        return View::make('tasks');
    }

    public function create()
    {
        // Show the create task form.
        return View::make('create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
    }

    public function handleCompleted(Task $task)
    {
        // Show the edit task form.
        return View::make('edit');
    }

    public function edit(Task $task)
    {
        // Show the edit task form.
        return View::make('edit');
    }

    public function handleEdit()
    {
        // Handle edit form submission.
    }

    public function delete()
    {
        // Show delete confirmation page.
        return View::make('delete');
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
    }
}