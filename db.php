<?php

try{
    $db = new PDO('mysql:host=localhost; dbname=course' , 'root');

}catch (Exception $e){
    die($e->getMessage());

}