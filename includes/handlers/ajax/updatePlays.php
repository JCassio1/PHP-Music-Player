<?php
  include("../../config.php");

  if(isset($_POST['songID'])) {

    $songID = $_POST['songID'];

    $query = mysqli_query($con, "UPDATE Songs SET plays = plays + 1 WHERE id='$songID'");

  }

 ?>
