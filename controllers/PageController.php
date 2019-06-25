<?php

namespace Notifier\Controllers;

use Notifier\Core\Database;
use Notifier\Core\Photo;

class PageController{

    public function welcome(){
        return view('welcome');
    }

    public function main(){
        if(isset($_FILES["image"])){
            return $this->photoupload();
       }
        return view('main');
    }

    public function mainNojs(){
        $lastoffset = $_REQUEST['offset'] ?? 0 ;
        $notifications = Database::selectAll("false",$lastoffset,"id,name");
        return view('main.nojs',compact('notifications','lastoffset'));
    }

    private function photoupload(){
       Photo::upload($_FILES['image']['tmp_name']);
       $filemtime = filemtime("uploads/profile.jpg");
       return view('main',compact('filemtime'));
    }

    public function addExist(){
        return view('insert-exist');
    }

    public function addExistNojs(){
        $lastoffset = $_REQUEST['offset'] ?? 0 ;
        $notifications = Database::selectAll("true",$lastoffset,"id,name");
        return view('insert-exist.nojs',compact('notifications','lastoffset'));
    }

    public function addNew(){
        return view('insert-new');
    }

    public function addNotification(){
        if(!isset($_POST['name'])){
            header('Content-type: application/json');
            echo json_encode(["status"=>"error"]);
            return;
        }

        $name = $_POST['name'];
        if($name===""){
            header('Content-type: application/json');
            echo json_encode([
                "status"=>"error",
                "error_msg"=>"No data added!"]);
            return;
        }

        if(isset($_POST['description']) && $_POST['description'] !== ''){
            $description = $_POST['description'];
            Database::insert($name,$description);
            header('Content-type: application/json');
            echo json_encode(["status"=>"success"]);
            return;
        }
        Database::insert($name);
        header('Content-type: application/json');
        echo json_encode(["status"=>"success"]);
    }
    
    public function addNotificationNoJs(){
        if(!isset($_POST['name'])){
            return view('404');
        }

        $name = $_POST['name'];
        if($name===""){
            echo "No data added!";
            header( "refresh:1;url='/main'" );
            die();
        }

        if(isset($_POST['description'])){
            $description = $_POST['description'];
            Database::insert($name,$description);
            header( "Location:/main" );
            die();
        }
        Database::insert($name);
        header( "Location:/main" );
        die();
    }

    public function notFound(){
        http_response_code(404);
        return view('404');
    }

    public function info(){
        if(!isset($_REQUEST['id'])){
            return view('404');
        }
        $id = $_REQUEST['id'];
        $notification = Database::selectWhere("notification","id=$id");
        return view('info.erase',compact('notification'));
    }

    public function infoAdd(){
        if(!isset($_REQUEST['id'])){
            return view('404');
        }
        $id = $_REQUEST['id'];
        $notification = Database::selectWhere("notification","id=$id");
        return view('info.add.delete',compact('notification'));
    }

    public function infoConfirm(){
        if(!isset($_POST['id'])){
            return view('404');
        }
        $id = $_POST['id'];
        $notificationName = $_POST['name'];
        return view('confirm',compact('id','notificationName'));
    }

    public function erase(){
        if(!isset($_POST['id'])){
            header('Content-type: application/json');
            echo json_encode(["status"=>"error"]);
            return;
        }
        $id=$_POST['id'];
        Database::updateToCompleted($id);
        header('Content-type: application/json');
        echo json_encode(["status"=>"success"]);
    }

    public function eraseNoJS(){
        if(!isset($_POST['id'])){
            return view('404');
        }
        $id=$_POST['id'];
        Database::updateToCompleted($id);
        header( "Location:/main/nojs" );
        die();
    }

    public function delete(){
        if(!isset($_POST['id'])){
            return view('404');
        }
        $id=$_POST['id'];
        Database::delete($id);
        header( "Location:/main/nojs" );
        die();
    }

    public function deleteNow(){
        header('Content-type: application/json');
        if(!isset($_POST['id'])){
            echo json_encode([
                "status"=>"error",
                "error_msg"=>"No right id provided"]);
                return;
        }
        $id=$_POST['id'];
        Database::delete($id);
        echo json_encode(["status"=>"success"]);
    }

    public function addExistNotification(){
        if(!isset($_POST['id'])){
            return view('404');
        }
        $id=$_POST['id'];
        Database::updateToUnCompleted($id);
        header( "Location:/main/nojs" );
        die();
    }

    public function addExistNotificationNow(){
        header('Content-type: application/json');
        if(!isset($_POST['id'])){
            echo json_encode([
                "status"=>"error",
                "error_msg"=>"No right id provided"]);
                return;
        }
        $id=$_POST['id'];
        Database::updateToUnCompleted($id);
        echo json_encode(["status"=>"success"]);
    }
}