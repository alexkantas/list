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
            <div class="extra content">
                <div class="ui two vertical buttons">
                    <form action="/info/add/act" method="POST">
                    <input type="hidden" name="id" value="<?=$notification->id?>">
                    <button type="submit" class="ui positive button info-action-button">Add Notification&nbsp<i class="icon plus"></i></button>
                    </form>
                    <form action="/info/delete" method="POST">
                    <input type="hidden" name="id" value="<?=$notification->id?>">
                    <input type="hidden" name="name" value="<?=$notification->name?>">
                    <button type="submit" class="ui negative button info-action-button">Delete Notification&nbsp<i class="icon trash"></i></button>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>