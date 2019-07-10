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
      $query = mysqli_query($this->con, "SELECT * FROM songs WHERE album='$this->id'");

      return mysqli_num_rows($query);
    }
}
?>
