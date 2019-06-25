<?php require "partials/header.php" ?>
<body class="ui middle aligned one column centered grid container">

    <div class="ui column info-area-container">
        <div class="ui card info-area">
            <div class="content">
                <div class="header">Delete notification</div>
                <div class="meta"><?= $notificationName ?></div>
                <div class="description description-area">
                    Are you sure ?
                    <p>This will be not reversal!</p>
                </div>
            </div>
            <div class="extra content">
                <div class="ui stackable two column grid info-confirm-action">
                    <div class="ui column">
                    <form action="/add/list/nojs">
                    <button class="ui positive fluid button info-action-button">No, cancel it!&nbsp<i class="icon remove"></i></button>
                    </form>
                    </div>
                    <div class="column">
                    <form action="/info/delete/act" method="POST">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <button class="ui negative fluid button info-action-button">Yes, delete it!&nbsp<i class="icon checkmark"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>