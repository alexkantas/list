<?php

namespace Notifier\Core;

class Request {
    public static function readURL(){
        return trim(
            parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)
            ,'/');
    }
}