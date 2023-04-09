<?php require_once '../db.php'?>
<?php require_once 'header.php' ?>



<div class="container">
    <?php

    $query = $db->prepare("Select * from contact limit 1");
    $query->execute();
    $contact = $query->fetch();

    if (isset($_GET['error'])){
        if ($_GET['error'] == 'data'){
            echo "<h2 style='color: red'>Melumatlari doldurun</h2>";
        }else if ($_GET['error'] == 'length'){
            echo "<h2 style='color: red'>Melumatlar dogru deyil</h2>";

        }

    }else if (isset($_GET['success']) && $_GET['success'] == true){
        echo "<h2 style='color: green'>Melumatlar daxil edildi</h2>";
    }


    ?>
</div>

<div class="container">
    <h2> Contact</h2>

    <form action="./functions/contact1.php" method="POST">
        <input class="form-control my-2" type="text" name="title" placeholder="title" value="<?php echo isset($contact['title']) ? $contact['title'] : '' ?>">
        <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($contact['text']) ? $contact['text'] : '' ?></textarea>
        <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once 'footer.php'?>
