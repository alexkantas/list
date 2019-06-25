<?php

return [
        'dbname' =>$_ENV["MYSQL_DB"],
        'username' => $_ENV["MYSQL_USER"],
        'password' => $_ENV["MYSQL_PASS"],
        'host' => $_ENV["MYSQL_HOST"],
        'dbprefix' => 'mysql',
        'options' =>[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ];