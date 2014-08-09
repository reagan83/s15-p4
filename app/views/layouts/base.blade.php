<!-- app/views/layouts/base.blade.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A simple task management utility developed for Harvard DWA15 with love from San Francisco, CA by Reagan Williams @ Microsoft.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Dwaly: Simple Task Management for DWA15 students</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="196x196" href="/images/touch/chrome-touch-icon-196x196.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Dwaly">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    @section('head')
        <link href="/css/glyphicon.css" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/cover.css" rel="stylesheet">


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

    @show

</head>
<body>

    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner"><a href="/">
                        <h4 class="masthead-brand">Dwa.ly <small>simple task management</small></h4></a> 
                        <ul class="nav masthead-nav">
                            <li class="{{Request::path() == '/' ? 'active' : '';}}"><a href="{{ action('TasksController@index') }}">To Do</a></li>
                            <li class="{{Request::path() == 'completed' ? 'active' : '';}}"><a href="{{ action('TasksController@completed') }}">Completed</a></li>
                            <li class="{{Request::path() == 'alltasks' ? 'active' : '';}}"><a href="{{ action('TasksController@alltasks') }}">All Tasks</a></li>
                            <li>
                                <div class="hero-avatar">
                                    <span class="avatar--large">
                                        <img src="/images/reagan.williams.jpg" class="avatar-image avatar-image--large imagePicker-target" title="Reagan Williams" alt="Reagan Williams">
                                    </span>
                                </div>
                            </li>
                            <li class="">
@if(Auth::check())
    <a href='{{ action('HomeController@logout') }}'>Log out {{ Auth::user()->email; }}</a>
@else 
    <a href='{{ action('HomeController@signup') }}'>Sign up</a> or <a href='{{ action('HomeController@login') }}'>Log in</a>
@endif
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
            <div class="container">



            <div class="row " style="margin-top: 25px; text-align: left;">
            <div class="col-md-5" style="float: none; margin: 0 auto;" role="main">

                @if(Session::get('flash_message'))
                    <div class="alert alert-info" role="alert">{{ Session::get('flash_message') }}</div>
                    <script>
                        window.setTimeout(function() { $(".alert").alert('close'); }, 2000);
                    </script>
                @endif


                @yield('body')

                <div class="mastfoot">
                    <div class="inner">
                        <p>Bootstrap template inspired by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                        </div>
                    </div>
                </div>

            </div>
            <br>

            </div>

        </div>

    </div>

<!-- Modal -->
<div class="modal custom fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="text-shadow: none; color: #3c3c3c;">
    <div class="modal-content">

    <form class="form" role="form" method="post" action="{{ action('TasksController@handleCreate') }}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Task</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <input type="text" class="form-control" id="taskname" name="taskname" placeholder="Task Name">
          </div>
          <div class="form-group" style="text-align: left;">
            <label for="notes" class="control-label" style="text-align: left;">Notes</label>
            <textarea class="form-control" rows="3" id="notes" name="notes"></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>

    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal custom fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="text-shadow: none; color: #3c3c3c;">
    <div class="modal-content">

    <ul class="errors">
    @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>


    <form class="form" role="form" method="post" action="{{ action('TasksController@handleEdit') }}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Task</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="taskid_edit" id="taskid_edit" value="">

          <div class="form-group">
              <input type="text" class="form-control" id="taskname_edit" name="taskname_edit" placeholder="Task Name">
          </div>
          <div class="form-group" style="text-align: left;">
            <label for="tasknotes_edit" class="control-label" style="text-align: left;">Notes</label>
            <textarea class="form-control" rows="3" id="tasknotes_edit" name="tasknotes_edit"></textarea>
          </div>


        <div class="form-group" style="text-align: left;">
            <label class="control-label" style="text-align: left;" id="taskcompleted_edit">Completed?</label>
              <input type="checkbox" class="form-control" id="taskcompleted_edit" name="taskcompleted_edit" placeholder="">
        </div>

        <div class="form-group" style="text-align: left;">
            <label class="control-label" style="text-align: left;" id="">Created Date</label>
              <input type="text" class="form-control" id="taskcreated_at_edit" name="taskcreated_at_edit" placeholder="" disabled>
        </div>
        <div class="form-group" style="text-align: left;">
            <label class="control-label" style="text-align: left;" id="taskcompleteddate_edit">Completed Date</label>
              <input type="text" class="form-control" id="taskcompleted_at_edit" name="taskcompleted_at_edit" placeholder="" disabled>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>

    </div>
  </div>
</div>


<script>

    $(document).on("click", ".open-editshowitemdialog", function () {
        console.log("show item hello!");
        var taskid = $(this).data("id");
        var taskname = $(this).data("taskname");
        var tasknotes = $(this).data("tasknotes");
        var taskcompleted = $(this).data("completed");
        var taskcreated_at = $(this).data("createddate");
        var taskupdated_at = $(this).data("completeddate");
        console.log(taskid);
        console.log(taskname);
        console.log(tasknotes);
        console.log(taskcompleted);
        console.log(taskcreated_at);
        $(".modal-body #taskid_edit").val(taskid);
        $(".modal-body #taskname_edit").val(taskname);
        $(".modal-body #tasknotes_edit").text(tasknotes);
        $(".modal-body #taskcreated_at_edit").val(taskcreated_at);
        $(".modal-body #taskcompleted_edit").prop('checked', false);

        if (taskcompleted == "1") { // only populate completed date if task is complete
            $(".modal-body #taskcompleted_edit").prop('checked', true);
            $(".modal-body #taskcompleted_at_edit").val(taskupdated_at);
        }
    });

</script>


  
</body>
</html>