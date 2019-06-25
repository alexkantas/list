<?php

namespace Notifier\Controllers;

class DataController {

    public function mainData(){
        $lastoffset = $_REQUEST['offset'] ?? 0 ;
        $notifications = \Notifier\Core\Database::selectAll("false",$lastoffset,"id,name,description");
        echo json_encode($notifications);
        die();
    }

    public function existData(){
        $lastoffset = $_REQUEST['offset'] ?? 0 ;
        $notifications = \Notifier\Core\Database::selectAll("true",$lastoffset,"id,name,description");
        echo json_encode($notifications);
        die();
    }

}