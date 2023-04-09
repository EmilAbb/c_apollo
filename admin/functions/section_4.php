<?php





require_once "../../db.php";
require_once "helper.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    redirect('../section4.php');
    return;
}





if (isset($_POST['title']) &&
    !empty($_POST['title']) &&
    isset($_POST['text']) &&
    !empty($_POST['text'])
){




    $title = htmlentities($_POST['title']);
    $text = htmlentities($_POST['text']);


    $section4 = getFourSection($db);
    if ($section4){
        $fileImg = $section4['image'];

        if ( isset($_FILES['image']) && $_FILES['image']['error'] == null){
            $fileImg = $_FILES['image']['full_path'];
            $folder = realpath(__DIR__."/../../uploads")."/".$fileImg;

            if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
                redirect('../section4.php?error=file');
                return;
            }
        }

                updateSection4($section4['id'],$db,$title,$text,$fileImg);
    }else{
if ( !isset($_FILES['image']) || empty($_FILES['image'])){
    redirect('../section4.php?error=file');
    return;
}
        $fileImg = $_FILES['image']['full_path'];
        $folder = realpath(__DIR__."/../../uploads")."/".$fileImg;

        if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
            redirect('../section4.php?error=file');
            return;
        }
        insertSection4($db,$title,$text,$fileImg);
    }

}else{
    redirect('../section4.php?error=data');
    return;
}


function getFourSection($db){

    $query = $db->prepare("select * from section_4 limit 1");
    $query->execute();
    return $query->fetch();

}


function insertSection4($db,$title,$text,$fileImg){
    if (strlen($title) > 100){
        redirect('../section4.php?error=length');
        return;
    }
    $query = $db->prepare("Insert into section_4 (title,text,image) values (?,?,?)");
    $query->execute([$title,$text,$fileImg]);
    redirect('../section4.php?success=true');
}

function updateSection4($id,$db,$title,$text,$fileImg){
    if (strlen($title) > 100){
        redirect('../section4.php?error=length');
        return;
    }
    $query = $db->prepare("Update  section_4 set title = ? , text = ? , image = ? where id = ?");
    $query->execute([$title,$text,$fileImg,$id]);
    redirect('../section4.php?success=true');
}
