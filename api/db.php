<?php
    
    $dbconf['driver']='mysql';
    $dbconf['dbhost']='localhost';
    $dbconf['dbuser']='sfabregat_root';
    $dbconf['dbpass']='linuxlinux';
    $dbconf['dbname']='sfabregat_storypub';
    $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
    $usr=$dbconf['dbuser'];
    $pwd=$dbconf['dbpass'];


    require 'config.slim.php';
    
    function getDB(){
        try{
            $dbh = new PDO('mysql:host=localhost;dbname=storypub', 'root', '');
        }
        catch (PDOException $ex){
            return null;
        }
        
        return $dbh;
    }
