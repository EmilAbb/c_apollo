<?php
require_once '../header.php';
require_once '../../db.php' ;
require_once 'helper.php'
?>

<?php

$url="../contact.php";

if(isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['subject']) && !empty($_POST['subject']) &&
    $_POST['action']=="insert"
){
    $email=deletemes($_POST['email']);
    $subject=deletemes($_POST['subject']);
    $message=deletemes($_POST['message']);

    $query = $db->prepare('insert into contact_message (email,subject,message) values (?,?,?)');
    $query->execute([$email,$subject,$message]);

    redirect("../../index.php");
    return;

}
else {
    if (!isset($_GET['id']) || empty($_GET['id']) || (int)$_GET['id'] == 0) {
        redirect("$url?error=data");
    }
    $query = $db->prepare('select * from usecontact_message where id=?');
    $query->execute([deletemes($_GET['id'])]);
    $contact = $query->fetch();
    if (!$contact) {
        redirect("$url?error=data");
    }

    $querydelete = $db->prepare('delete from contact_message where id=?');
    $querydelete->execute([deletemes($_GET['id'])]);
    $contact = $query->fetch();

    redirect("$url?delete=true");

}
?>
