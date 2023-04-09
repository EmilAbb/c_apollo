<?php require_once '../db.php'?>
<?php require_once 'header.php'?>
<?php require_once './functions/helper.php'?>


<div class="container">
    <?php

    $querySection4 = $db->prepare('select * from section_4 limit 1');
    $querySection4->execute();
    $section4 = $querySection4->fetch();

    require_once "./functions/error.php"

    ?>
</div>

<div class="container">
    <h2>Section 4</h2>
    <form action="functions/section_4.php" method="POST" enctype="multipart/form-data">
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section['title']) ? $section['title'] : "" ?>">
        <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($section['text']) ? $section['text'] : "" ?></textarea>


        <?php
        if (isset($section4['image'])){
          ?>
            <img width="200" src="<?php echo  getImage($section4['image']);?>">
  <?php

        }
        ?>


        <input class="form-control my-2" type="file" name="image">




        <button class="btn btn-primary">Save</button>









    </form>
</div>

<?php require_once 'footer.php'?>
