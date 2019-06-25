<!DOCTYPE html>
<html lang="en">

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
        <div id="infoModal" class="ui fullscreen modal">
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
                <button id="eraseBtn" class="ui negative right labeled icon button">
                    Erase Notification
                    <i class="erase icon"></i>
                </button>
            </div>
            <!--/Modal-->
        </div>

        <div id="addModal" class="ui fullscreen modal">
            <i class="close icon"></i>
            <div class="header">
                <h1>Add Notification</h1>
            </div>
            <div class="content">
                <div class="description">
                <form id="addForm" class="ui form">
                <div class="field">
                    <label>Name</label>
                    <input name="name" placeholder="Enter the notification name" type="text" required>
                </div>
                <div class="field">
                    <label>Description</label>
                    <input name="description" placeholder="Enter the notification description" type="text">
                </div>
            </form>
            </div>
            </div>
            <div class="actions">
                <div class="ui black deny button">
                    Close
                </div>
                <button id="addButton" class="ui positive right labeled icon button">
                    Add notification
                    <i class="plus icon"></i>
                </button>
            </div>
            <!--/Modal-->
        </div>

    <div class="ui right wide sidebar vertical menu">
        <a class="ui item centered-content">
        <form id="uploadform" action="/main" method="post" enctype="multipart/form-data">
            <div class="ui small circular image">
            <label for="fileInput">
                <img src="/uploads/profile.jpg?<?=$filemtime ?? "0"?>">
            </label>
                <input type="file" name="image" id="fileInput" style="display:none">
            </div>
        </form>
        </a>
        <a href="/add/list" class="item"><i class="list layout icon"></i>Show All</a>
        <a class="item" href="/add"><i class="plus square outline icon"></i>Add New</a>
        <a id="close-sidebar-button" class="item"><i class="reply icon"></i>Close</a>
    </div>

    <div class="pusher">

        <div class="ui middle aligned one column centered grid container">

            <div class="ui column main-area">

                <div class="notifications-area">
                    <ul id="notifications">
                    <noscript>Please visit the <a href="/main/nojs">No javascript page</a></noscript>
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
        <button id="addBtn" class="ui blue circular icon button float-symbol add-symbol"><i class="large inverted plus icon"></i></button>
        
        <!--/Pusher-->
    </div>
       
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Semantic core JavaScript-->
    <script src="/public/js/semantic.js"></script>

    <!-- Custom JS -->
    <script src="/public/js/main.js"></script>
    
    <!-- Custom JS -->
    <script src="/public/js/main-s.js"></script>

</body>

</html>