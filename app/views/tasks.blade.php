<!-- app/views/tasks.blade.php -->

<?php

$loggedin = false;

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Narwhals</title>
</head>
<body>
    @include('header')

@if ($loggedin == false)
    <p>Yikes user is not logged in!!</p>
@else
    <p>User is logged in - let's show him/her tasks!</p>
@endif


    <p>Why, the Narhwal surely bacons at midnight, my good sir!</p>
    
    @include('footer')
</body>
</html>




