<?php require_once '../db.php'?>
<?php require_once 'header.php'?>


<div class="container">
    <?php

    $query = $db->prepare('select * from section_1 limit 1');
     $query->execute();
     $section = $query->fetch();

       require_once "./functions/error.php"

    ?>
</div>

<div class="container">
  <h2>Section 1</h2>
  <form action="functions/section1.php" method="POST">
      <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section['title']) ? $section['title'] : "" ?>">
      <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($section['text']) ? $section['text'] : "" ?></textarea>
      <button class="btn btn-primary">Save</button>
  </form>
</div>

<?php require_once 'footer.php'?>



