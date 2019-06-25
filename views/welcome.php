<?php
if(Notifier\Core\App::isAuthed()){
 header( "refresh:3;url='/main'" );
}
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alex Kantas">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="icon" href="/public/favicon.ico">

    <title>Notifier</title>

    <!-- Semantic core CSS -->
    <link href="./public/css/semantic.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body class="ui middle aligned one column centered grid container">

    <div class="ui column">
        <div id="welcome-message" class="box">
            <h1>Welcome!</h1>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        setTimeout(function () {
            $('#welcome-message').addClass("not-Alex");
            $('#welcome-message h1').text("You are not Authed !!!");
        }, 8000);
    </script>
</body>

</html>