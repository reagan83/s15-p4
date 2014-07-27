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


    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <h4 class="masthead-brand">Dwa.ly <small>simple task management</small></h4> 
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="/loremipsum">To Do</a></li>
                            <li class=""><a href="/loremipsum">Completed</a></li>
                            <li>
                                <div class="hero-avatar">
                                    <span class="avatar--large">
                                        <img src="/images/reagan.williams.jpg" class="avatar-image avatar-image--large imagePicker-target" title="Reagan Williams" alt="Reagan Williams">
                                    </span>
                                </div>
                            </li>
                            <li class=""><a href="/useripsum">Logout</a></li>
                        </ul>

                    </div>

                </div>

            </div>
            <div class="container">
                        <button type="button" class="btn btn-info">Create New Task</button>

            <div class="row " style="margin-top: 25px;">
            <div class="col-md-3" style="float: none; margin: 0 auto;" role="main">


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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  
</body>
</html>