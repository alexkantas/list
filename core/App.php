<?php

namespace Notifier\Core;

class App{

public static $authedKey=[
    'CookieName' => '',
    'CookieValue' => ''
];

public static function setKey($authedKey){
    static::$authedKey=$authedKey;
}

public static function isAuthed(){
    if(isset($_COOKIE[static::$authedKey['CookieName']])){
    return 
    $_COOKIE[static::$authedKey['CookieName']]==static::$authedKey['CookieValue'] 
    ? true : false ;
    }
    return false;
}

}