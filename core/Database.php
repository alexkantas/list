<?php

namespace Notifier\Core;

use \PDO;

class Database{
    private static $pdo;

    public static function make($config){
        try{
            if(App::isAuthed()){
            static::$pdo = new PDO(
                "{$config['dbprefix']}:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password'],
                $config['options']);}
        } catch (\PDOException $e){
            var_dump($config);
            die("Could not connect because ".$e->getMessage());
        }
    }

    public static function getConnection(){
        if(isset(static::$pdo)) return static::$pdo;
        throw new \Exception("Δεν έχει γίνει αρχικοποίηση της Βάσης Δεδομένων!");
    }

    public static function selectAll(string $completed,$offset = 0,$elements = "*"){
        $limit = 8 ;
        $statement = static::$pdo->prepare("SELECT {$elements} FROM notification WHERE completed = {$completed} ORDER BY dateAdded DESC LIMIT {$limit} OFFSET {$offset};");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public static function countAll(string $completed){
        $statement = static::$pdo->query("SELECT COUNT(*) FROM notification WHERE completed = {$completed};");
        $notificationsNum = intval($statement->fetchColumn());
        return $notificationsNum;
    }

    public static function selectWhere($table,$where,$element = "*"){
        $statement = static::$pdo->prepare("SELECT {$element} FROM {$table} WHERE {$where} LIMIT 1;");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
        $s1 = $statement->fetch(PDO::FETCH_OBJ);
        var_dump($s1);
        die();
    }

    public static function updateToCompleted(int $id){
        $statement = static::$pdo->prepare("UPDATE notification SET completed=true , dateAdded=NOW() WHERE id={$id}");
        $statement->execute();
    }

    public static function updateToUnCompleted(int $id){
        $statement = static::$pdo->prepare("UPDATE notification SET completed=false , dateAdded=NOW()  WHERE id={$id}");
        $statement->execute();
    }

    public static function delete(int $id){
        $statement = static::$pdo->prepare("DELETE FROM notification WHERE id={$id}");
        $statement->execute();
    }

    public static function insert($name,$description=""){

        $query = "INSERT INTO notification(name,completed,dateAdded) VALUES ('$name',false,NOW())";
        
        if($description!=""){
        $query = "INSERT INTO notification(name,description,completed,dateAdded) 
        VALUES ('$name','$description',false,NOW())";}
        
        $statement = static::$pdo->prepare($query);
        $statement->execute();
    }
}