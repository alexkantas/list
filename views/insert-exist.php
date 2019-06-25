<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alex Kantas">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="icon" href="/public/favicon.ico">

    <title>Notifier</title>

    <!-- Semantic core CSS -->
    <link href="/public/css/semantic.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/public/css/style.css" rel="stylesheet">

</head>

<body>
        <div id="infoModal" class="ui modal">
            <i class="close icon"></i>
            <div class="header">
                <h1 id="notification-title"></h1>
            </div>
            <div class="content">
                <div class="description">
                    <h3 id="notification-description"></h3>
                </div>
            </div>
            <div class="actions">
                <div class="ui black deny button">
                    Close
                </div>
                <button id="addBtn" class="ui positive right labeled icon button">
                   Add Notification
                    <i class="plus icon"></i>
                </button>
                <button id="delBtn" class="ui negative right labeled icon button">
                    Delete Notification
                    <i class="trash icon"></i>
                </button>
            </div>
            <!--/Modal-->
        </div>

        <div id="deleteModal" class="ui modal">
            <i class="close icon"></i>
            <div class="header">
                <h1>Are you sure ?</h1>
            </div>
            <div class="content">
                <div class="description">
                    <h3>Delete the notification <span id="notifNam"></span> ?</h3>
                    <p>This will be not reversible!</p>
                </div>
            </div>
            <div class="actions">
                <div class="ui black deny button">
                    Cancel
                </div>
                <button id="deleteButton" class="ui negative right labeled icon button">
                    Delete Notification
                    <i class="trash icon"></i>
                </button>
            </div>
            <!--/Modal-->
        </div>

    <div class="ui right wide sidebar vertical menu">
        <a class="ui item centered-content">
            <div class="ui small circular image">
                <img src="/uploads/profile.jpg">
            </div>
        </a>
        <a href="/main" class="item"><i class="list layout icon"></i>Show Current</a>
        <a class="item" href="/add"><i class="plus square outline icon"></i>Add New</a>
        <a id="close-sidebar-button" class="item"><i class="reply icon"></i>Close</a>
    </div>

    <div class="pusher">

        <div class="ui middle aligned one column centered grid container">

            <div class="ui column main-area">

                <div class="notifications-area">
                <noscript>Please visit the <a href="/add/list/nojs">No javascript page</a></noscript>
                    <ul id="notifications">
                    </ul>
                  <button id="loadmore" class="ui basic negative loading button notification">Load More</button> 
                  <button id="errorBtn" onClick="location.reload()" class="ui negative button notification">Error, please try again!</button> 
                    <!--/Notifications-Area-->
                </div>
                <!--/Column-->
            </div>
            <!--/Container-->
        </div>

        <button id="sidebar-button" class="ui black icon button float-symbol list-symbol"><i class="list icon"></i></button>
        <a href="/main" class="ui violet circular icon button float-symbol add-symbol"><i class="large inverted home icon"></i></a>
        
        <!--/Pusher-->
    </div>
       

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Semantic core JavaScript-->
    <script src="/public/js/semantic.js"></script>

    <!-- Custom JS -->
    <script src="/public/js/main.js"></script>
    
    <!-- Custom JS -->
    <script src="/public/js/list-s.js"></script>

</body>

</html>