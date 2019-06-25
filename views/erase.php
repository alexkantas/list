<?php require 'partials/header-s.php'; ?>


    <div class="row">
        <div class="main-area info-area">
            <div class="info-area-content">
                <div class="jumbotron">
                    <h1><?= $notification->name ?></h1>
                    <p><?= $notification->description ?></p>
                    <?php $date = new DateTime($notification->dateAdded);?>
                    <p><?= $date->format("j F , g:i a"); ?></p>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <button type="button" class="btn btn-success" onclick="history.back()"><i class="glyphicon glyphicon-circle-arrow-left"></i></button>
                    </div>
                    <div class="col-xs-9">
                        <form action="/erase" method="post">
                        <input type="hidden" name="id" value="<?=$notification->id?>">
                        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Erase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require 'partials/footer-s.php'; ?>