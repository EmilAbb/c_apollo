<?php

try{
    $db = new PDO('mysql:host=localhost; dbname=apollo' , 'root');

}catch (Exception $e){
    die($e->getMessage());

}