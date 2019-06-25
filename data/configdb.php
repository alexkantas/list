<?php

return [
        'dbname' =>"notifier",
        'username' => "root",
        'password' => "",
        'host' => "localhost",
        'dbprefix' => 'mysql',
        'options' =>[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ];