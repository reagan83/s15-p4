<?php

// app/controllers/TasksController.php

class TasksController extends BaseController
{

    public function index()
    {

        if (Auth::check() == false) {
            return View::make('login')->with('flash_errors', 'Must be logged in.');
        }

        $auth_email = Auth::user()->email;

        // Show a listing of tasks.
        $tasks = Task::where('completed', '=', '0')->where('email', '=', $auth_email)->get();

        return View::make('home', compact('tasks'));
    }

    public function alltasks()
    {
        if (Auth::check() == false) {
            return View::make('login')->with('flash_errors', 'Must be logged in.');
        }

        $auth_email = Auth::user()->email;

        // Get all tasks.
        $tasks = Task::where('email', '=', $auth_email)->get();

        return View::make('alltasks', compact('tasks'));
    }

    public function completed()
    {

        if (Auth::check() == false) {
            return View::make('login')->with('flash_errors', 'Must be logged in.');
        }

        $auth_email = Auth::user()->email;

        // Get completed tasks.
        $tasks = Task::where('completed', '=', '1')->where('email', '=', $auth_email)->get();

        return View::make('completed', compact('tasks'));
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $data = Input::all();

        // Build the validation constraint set.
        $rules = array(
            'taskname' => 'required|min:1'
        );

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            $task = new Task;
            $task->taskname = Input::get('taskname', 'reagan');
            $task->notes = Input::get('notes', 'reagan');
            $task->email = Auth::user()->email;
            $task->save();

            return Redirect::action('TasksController@index');
        }

        return Redirect::action('TasksController@index')->with('flash_errors', 'Task Name Required.');
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

            // parse task complete checkbox!
            if (Input::get('taskcompleted_edit') == "on") {
                $task->completed = 1;
            } else {                
                $task->completed = 0;
            }

            $task->save();

        return Redirect::action('TasksController@alltasks')->with('flash_message', 'Task Updated!');
        }


        return Redirect::action('TasksController@alltasks')->with('flash_errors', 'Taskname cannot be empty');

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