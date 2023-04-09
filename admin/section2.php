

<?php require_once '../db.php'?>
<?php require_once './functions/helper.php'?>
<?php require_once 'header.php'?>


<div class="container">
    <?php

    $query = $db->prepare('select * from section_2 limit 1');
     $query->execute();
     $section = $query->fetch();

    require_once "./functions/error.php"


    ?>
</div>

<div class="container">
  <h2>Section 2</h2>
  <form action="functions/section_2.php" method="POST" enctype="multipart/form-data">
      <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section['title']) ? $section['title'] : "" ?>">
      <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($section['text']) ? $section['text'] : "" ?></textarea>


      <?php
        if (isset($section['image'])){
            ?>
            <img src="<?php echo getImage($section['image']);?>">
      <?php

        }
      ?>

      <input type="file" class="form-control my-2" name="image" >



      <input type="text" class="form-control my-2" name="facebook" placeholder="facebook" value="<?php echo isset($section['facebook']) ? $section['facebook'] : "" ?>">
      <input type="text" class="form-control my-2" name="instagram" placeholder="instagram" value="<?php echo isset($section['instagram']) ? $section['instagram'] : "" ?>">
      <input type="text" class="form-control my-2" name="twitter" placeholder="twitter" value="<?php echo isset($section['twitter']) ? $section['twitter'] : "" ?>">
      <input type="text" class="form-control my-2" name="pinterest" placeholder="pinterest" value="<?php echo isset($section['pinterest']) ? $section['pinterest'] : "" ?>">

      <button class="btn btn-primary">Save</button>
  </form>
</div>

<?php require_once 'footer.php'?>
