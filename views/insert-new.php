<?php require 'partials/header.php'; ?>

<body class="ui middle aligned one column centered grid container">

    <div class="ui column">

        <div class="ui segment">
            <div class="ui attached icon message info-message">
                <i class="sticky note icon"></i>
                <div class="content">
                    <div class="header">
                        Add new Notification
                    </div>
                    <p>Enter the notification name and the description</p>
                </div>
            </div>
            <form class="ui massive form" action="add/new/nojs" method="post">
                <div class="field">
                    <label>Name</label>
                    <input name="name" placeholder="Enter the notification name" type="text" required>
                </div>
                <div class="field">
                    <label>Description</label>
                    <input name="description" placeholder="Enter the notification description" type="text">
                </div>
                <button type="submit" class="ui submit icon big button submit-button">Add notification&nbsp<i class="plus icon"></i></button>
            </form>
        </div>


        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Semantic core CSS -->
        <link href="./public/css/semantic.css" rel="stylesheet">

</body>

</html>