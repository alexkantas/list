<?php

namespace Notifier\Core;

class Router{
    private static $routes = [];
    
    public static function load($routes){
        static::$routes = $routes; 
    }

    public static function direct($uri){
        if(array_key_exists($uri,static::$routes)){
           return static::callAction(
               ...explode('@',static::$routes[$uri])
               );
        }
        
        $controller = new \Notifier\Controllers\PageController;
        return $controller->notFound();
    }

    private static function callAction($controller,$action){

        $controller =  "Notifier\Controllers\\$controller";
        $controller =  new $controller;

        if(!method_exists($controller,$action)){
            throw new Exception("{$controller} not respont to the {$action} action");
        }

        return $controller->$action();
    }

    
}