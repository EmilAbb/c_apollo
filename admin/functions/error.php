<?php
if (isset($_GET['error'])){

    if ($_GET['error'] == 'data'){
        echo "<h2 style='color: red'>Melumatlari doldurun</h2>";
    }else if ($_GET['error'] == 'length'){
        echo "<h2 style='color: red'>Melumatlari dogru deyil</h2>";

    }else if ($_GET['error'] == 'file'){
    echo "<h2 style='color: red'>File yuklenmeyib</h2>";


}



} else if(isset($_GET['success']) && $_GET['success'] == true){

    echo "<h2 style='color: green'>Melumatlari elave edildi</h2>";
}