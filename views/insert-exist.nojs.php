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

 <div class="ui middle aligned one column centered grid container">

            <div class="ui column main-area main-area-nojs">

                <div class="notifications-area notifications-area-nojs">
                    <ul id="notifications">
                    <?php foreach($notifications as $notification):?>
                    <li>
                    <form action="/info/add" method="POST">
                    <input type="hidden" name="id" value="<?=$notification->id?>">
                    <button type="submit" class="ui basic blue button notification"><?=$notification->name?></button>
                    </form>
                    </li>
                    <?php endforeach ?>
                    </ul>
                  <div class="page-select">
                  </div> 
                    <!--/Notifications-Area-->
                </div>
                </div>
                <!--/Column-->
                <div class="row navigation-buttons">
                    <div class"column">
                    <div class="ui pagination menu">
                        <?= $lastoffset < 7 ? '<a class="disabled item">':'<a href="/add/list/nojs?offset='.($lastoffset-7).'" class="item">'?>
                            <i class="chevron left icon"></i>
                        </a>
                        <?= count($notifications) <= 7 ? '<a class="disabled item">':'<a href="/add/list/nojs?offset='.($lastoffset+7).'" class="item">'?>
                            <i class="chevron right icon"></i>
                        </a>
                    </div>
                  </div>
                </div>
                <!--/Column-->
            </div>
            <!--/Container-->
        </div>

        <a href="/main/nojs" class="ui violet circular icon button float-symbol add-symbol"><i class="large inverted home icon"></i></a>
        

</body>

</html>