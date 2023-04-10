<?php

function redirect($url){
    header("location:$url");
}


function getImage($name){
 return "http://localhost/apollo/uploads/$name";
}

function deletemes ($dat){
    return trim(strip_tags($dat));
}