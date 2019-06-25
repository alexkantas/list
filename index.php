<?php 

require 'vendor/autoload.php';
require 'core/functions.php';

use  Notifier\Core\{App,Database,Router,Request};
use  Notifier\Controllers\{DataController,PageController};

App::setKey(require 'data/alexkey.php');
Database::make(require 'data/configdb.php');

Router::load(require 'app/routes.php');

if(App::isAuthed()){
return Router::direct(Request::readURL());
}

Router::direct("");