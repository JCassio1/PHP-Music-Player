<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">you Might Also Like</h1>

<div class="gridViewContainer">
  <?php $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND()");

  //loops through each row in the table
  while ($row = mysqli_fetch_array($albumQuery)) {
    echo $row = $row['title'] . "<br>"; //this adds a new line
  }

  ?>
</div>

<?php include("includes/footer.php"); ?>
