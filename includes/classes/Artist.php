<?php

class Artist{

    private $con;
    private $id;
    private $test = "shit";

    //This is the first function that gets called in this class (constructor)
    public function __construct($con, $id){
      $this->con = $con;
      $this->id = $id;
    }

    public function getName(){
      $artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
      $artist = mysqli_fetch_array($artistQuery);

      return $artist['name'];
    }
}

?>
