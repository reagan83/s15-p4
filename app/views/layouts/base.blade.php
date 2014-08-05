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
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/cover.css" rel="stylesheet">
    @show

</head>
<body>

    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <h4 class="masthead-brand">Dwa.ly <small>simple task management</small></h4> 
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="{{ action('TasksController@index') }}">To Do</a></li>
                            <li class=""><a href="{{ action('TasksController@completed') }}">Completed</a></li>
                            <li>
                                <div class="hero-avatar">
                                    <span class="avatar--large">
                                        <img src="/images/reagan.williams.jpg" class="avatar-image avatar-image--large imagePicker-target" title="Reagan Williams" alt="Reagan Williams">
                                    </span>
                                </div>
                            </li>
                            <li class="">

@if(Auth::check())
    <a href='/logout'>Log out {{ Auth::user()->email; }}</a>
@else 
    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
@endif

                                <a href="{{ action('TasksController@logout') }}">Logout</a></li>
                        </ul>

                    </div>

                </div>

            </div>
            <div class="container">

            <div class="row " style="margin-top: 25px; text-align: left;">
            <div class="col-md-5" style="float: none; margin: 0 auto;" role="main">

                <button class="btn btn-info" data-target="#create" data-toggle="modal">Create New Task</button>

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



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  
</body>
</html>