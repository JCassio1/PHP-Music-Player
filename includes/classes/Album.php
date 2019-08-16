<?php

class Album{

    private $con;
    private $id;
    private $title;
    private $artistID;
    private $genre;
    private $artworkPath;

    //This is the first function that gets called in this class (constructor)
    public function __construct($con, $id){
      $this->con = $con;
      $this->id = $id;

      $albumQuery = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
      $album = mysqli_fetch_array($albumQuery);

      $this->title = $album['title'];
      $this->artistID = $album['artist'];
      $this->genre = $album['genre'];
      $this->artworkPath = $album['artworkPath'];
    }

    public function getTitle(){
        return $this->title;
    }

    public function getArtist(){
        return new Artist($this->con, $this->artistID);
    }

    public function getGenre(){
        return $this->genre;
    }

    public function getArtworkPath(){
        return $this->artworkPath;
    }

    public function getNumberOfsongs(){
      $query = mysqli_query($this->con, "SELECT COUNT(*) FROM Songs WHERE album = '$this->id'");
      $getAlbumTrackResult = mysqli_fetch_array($query);

      return $getAlbumTrackResult[0];
    }

    public function getSongIDs(){

      $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");

      $array = array();

      //Loop that iterates through array using each row
      while($row = mysqli_fetch_array($query)) {
        array_push($array, $row['id']);
      }

      return $array;

    }
}
?>
