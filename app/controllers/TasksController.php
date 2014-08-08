<?php

// app/controllers/TasksController.php

class TasksController extends BaseController
{
    public function index()
    {
        // Show a listing of tasks.
        $tasks = Task::where('completed', '=', '0')->get();

        return View::make('home', compact('tasks'));
    }

    public function alltasks()
    {
        // Get all tasks.
        $tasks = Task::all();

        return View::make('alltasks', compact('tasks'));
    }

    public function completed()
    {
        // Get completed tasks.
        $tasks = Task::where('completed', '=', '1')->get();

        return View::make('completed', compact('tasks'));
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $task = new Task;
        $task->taskname = Input::get('taskname', 'reagan');
        $task->notes = Input::get('notes', 'reagan');
        $task->save();

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
        $data = Input::all();

        // Build the validation constraint set.
        $rules = array(
            'taskname_edit' => 'required|min:1'
        );

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            // Handle edit form submission.
            $task = Task::findOrFail(Input::get('taskid_edit'));
            $task->taskname = Input::get('taskname_edit');
            $task->notes = Input::get('tasknotes_edit');
            $task->completed = 1;
            $task->save();  

            return "data was saved.";
//        return Redirect::action('TasksController@home');
        }


        return Redirect::action('TasksController@index')->withErrors($validator);

    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('id');
        $task = Task::findOrFail($id);
        $task->delete();

        return Redirect::action('TasksController@home');
    }
}