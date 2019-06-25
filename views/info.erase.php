<?php require "partials/header.php" ?>
<body class="ui middle aligned one column centered grid container">

    <div class="ui column info-area-container">
        <div class="ui card info-area">
            <div class="content">
                <div class="header"><?= $notification->name ?></div>
                <?php $date = new DateTime($notification->dateAdded);?>
                <div class="meta"><?= $date->format("j F , g:i a"); ?></div>
                <div class="description description-area">
                <?= $notification->description ?>
                </div>
            </div>
            <div class="extra content" style="display:none">
                <div class="ui two vertical buttons">
                    <div class="ui positive button info-action-button">Add Notification&nbsp<i class="icon plus"></i></div>
                    <div class="ui negative button info-action-button">Delete Notification&nbsp<i class="icon trash"></i></div>
                </div>
            </div>
            <div class="extra content">
                <form action="/erase/nojs" method="POST">
                <input type="hidden" name="id" value="<?=$notification->id?>">
                <button type="submit" class="ui basic fluid red button info-action-button">Erase Notification&nbsp&nbsp&nbsp<i class="icon erase"></i>
                </button>
            </div>
        </div>

</body>

</html>