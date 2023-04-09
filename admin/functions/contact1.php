<?php
require_once '../../db.php';
require_once 'helper.php';

if ($_SERVER['REQUEST_METHOD'] != "POST"){
    redirect('../contact.php');
    return;
}

if (isset($_POST['title']) && isset($_POST['text']) && !empty($_POST['title']) &&  !empty($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];

    $firstContact = getFirstContact($db);


    if ($firstContact){

        updateContact($firstContact['id'],$db,$title,$text);
    }else{
        insertContact($db,$title,$text);
    }

}else{
    redirect('../contact.php?error=data');
    return;
}

function getFirstContact($db){
    $query = $db->prepare("Select * from contact limit 1");
    $query->execute();
    return $query->fetch();
}

function insertContact($db,$title,$text){

    if (strlen($_POST['title']) > 100 && strlen($_POST['text']) > 1000){
        redirect('../contact.php?error=length');
        return;
    }

    $contactQuery = $db->prepare ("Insert into contact (title,text) values(?,?)");
    $contactQuery->execute([$title,$text]);
    redirect('../contact.php?success=true');
}

function updateContact($id,$db,$title,$text){

    if (strlen($_POST['title']) > 100 && strlen($_POST['text']) > 1000){
        redirect('../contact.php?error=length');
        return;
    }

    $contactQuery = $db->prepare ("Update  contact set title = ? , text = ? where id = ?");
    $contactQuery->execute([$title,$text,$id]);
    redirect('../contact.php?success=true');
}

