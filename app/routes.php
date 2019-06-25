<?php

return [
    "" => "PageController@welcome",
    "welcome" => "PageController@welcome",
    "main" => "PageController@main",
    "main/nojs" => "PageController@mainNojs",
    "main/newpic" => "PageController@photoupload",
    "main/data" => "DataController@mainData",
    "info" => "PageController@info",
    "info/add" => "PageController@infoAdd",
    "info/add/act" => "PageController@addExistNotification",
    "info/add/now" => "PageController@addExistNotificationNow",
    "info/delete" => "PageController@infoConfirm",
    "info/delete/act" => "PageController@delete",
    "info/delete/now" => "PageController@deleteNow",
    "erase" => "PageController@erase",
    "erase/nojs" => "PageController@eraseNoJs",
    "add" => "PageController@addNew",
    "add/new" => "PageController@addNotification",
    "add/new/nojs" => "PageController@addNotificationNoJs",
    "add/list" => "PageController@addExist",
    "add/list/nojs" => "PageController@addExistNojs",
    "add/list/data" => "DataController@existData"
];