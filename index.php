<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">
  <?php

        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

        //loops through each row in the table
        while ($row = mysqli_fetch_array($albumQuery)) {

        echo "

          <div class='gridViewItem'>

              <a href='album.php?id=" . $row['id'] . "'>

                <img src='". $row['artworkPath'] . "'>

                <div class='gridViewInformation'>"
                  . $row['title'] .
                "</div>

              </a>

          </div>";
  }
  ?>
</div>

<?php include("includes/footer.php"); ?>
