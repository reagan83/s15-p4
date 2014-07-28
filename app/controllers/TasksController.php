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

    public function handleCreate()
    {
        // Handle create form submission.
        $task = new Task;
        $task->taskname = Input::get('taskname');
        $game->notes = Input::get('notes');
        $game->save();

        return Redirect::action('TasksController@index');
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
        $task = Task::findOrFail(Input::get('id'));
        $task->taskname = Input::get('taskname');
        $task->notes = Input::get('notes');
        $task->completed_at = Input::get('completed');
        $task->save();

        return Redirect::action('TasksController@index');
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('id');
        $task = Game::findOrFail($id);
        $task->delete();

        return Redirect::action('TasksController@index');
    }
}