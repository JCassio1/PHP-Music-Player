<?php

  $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

  $resultArray = array();

  while($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
  }

  $jsonArray = json_encode($resultArray);
 ?>

 <script>
  $(document).ready(function() {
    currentPlaylist = <?php echo $jsonArray; ?>;
    audioElement = new Audio();
    setTrack(currentPlaylist[0], currentPlaylist, false);
    updateVolumeProgressBar(audioElement.audio); //call function when is able to play


    //Easier to create one function instead of various for each behaviour
    $("#playingBarContainer").on("mousedown touchstart mousemove touchmove", function(e){
        e.preventDefault(); //preventDefault prevents normal behaviour including highights
    });

    $(".playbackBar .progressBar").mousedown(function(){
      mouseDown = true;
    });

    $(".playbackBar .progressBar").mousemove(function(e){
      if(mouseDown == true) {
        //set time of the song where mouse is dragged
        timeFromOffset(e, this); //'this' refers function that called the function
      }
    });

    $(".playbackBar .progressBar").mouseup(function(e){
        //set time of the song where mouse is dragged
        timeFromOffset(e, this); //'this' refers function that called the function
    });


    $(".volumeBar .progressBar").mousedown(function(){
      mouseDown = true;
    });

    $(".volumeBar .progressBar").mousemove(function(e){
      if(mouseDown == true) {
        var percentage = e.offsetX / $(this).width();

        if(percentage >= 0 && percentage <= 1){
          audioElement.audio.volume = percentage;
        }
      }
    });

    $(".volumeBar .progressBar").mouseup(function(e){

      var percentage = e.offsetX / $(this).width();

      if(percentage >= 0 && percentage <= 1){
        audioElement.audio.volume = percentage;
      }
    });

    $(document).mouseup(function(){
      mouseDown = false;
    });


  });

  function timeFromOffset(mouse, progressBar){
      var percentage = mouse.offsetX / $(progressBar).width() * 100;
      var seconds = audioElement.audio.duration * (percentage / 100);
      audioElement.setTime(seconds);
  }

  function nextSong(){

    if (repeat == true){
      audioElement.setTime(0);
      playSong();
      return;
    }

    if (currentIndex == currentPlaylist.lenght - 1) {
      currentIndex = 0;
    }

    else{
      currentIndex++;
    }

    var trackToPlay = currentPlaylist[currentIndex];
    setTrack(trackToPlay, currentPlaylist, true);
  }

  function setRepeat(){

    repeat = !repeat; //Shorter way of doing (if/else)

    var imageName = repeat ? "repeat-active.png" : "repeat.png";

    $(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);

  }

  function setTrack(trackID, newPlaylist, play) {

    currentIndex = currentPlaylist.indexOf(trackID);
    pauseSong();

    $.post("includes/handlers/ajax/getSongJSON.php", {songID: trackID}, function(data){

      var track = JSON.parse(data);

      $(".trackName span").text(track.title);

      $.post("includes/handlers/ajax/getArtistJSON.php", {artistID: track.artist}, function(data){

        var artist = JSON.parse(data);

        $(".artistName span").text(artist.name);

      });

      $.post("includes/handlers/ajax/getAlbum.php", {albumID: track.album}, function(data){

        var album = JSON.parse(data);

        $(".albumLink img").attr("src", album.artworkPath);

      });


      audioElement.setTrack(track);
      playSong();
    })

    if(play ==  true){
      audioElement.play();
    }
  }

  function playSong(){

    if(audioElement.audio.currentTime == 0){

      $.post("includes/handlers/ajax/updatePlays.php", {songID: audioElement.currentlyPlaying.id});

      console.log("Function called");
    }


    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
  }

  function pauseSong(){
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
  }
 </script>

<div id="playingBarContainer">

    <div id="playingBar">

      <div id="nowPlayingLeftSide">
        <div class="content">
          <span class="albumLink">
            <img src="" class="albumArtwork" alt="nowPlaying">
          </span>

          <div class="trackInformation">

            <span class="trackName">
              <span></span>
            </span>

            <span class="artistName">
              <span> </span>
            </span>

          </div>

        </div>
      </div>

      <div id="nowPlayingCenterSide">

          <div class="content playerControls">

            <div class="buttons">

              <button class="controlButton shuffle" title="shuffle button">
                <img src="assets/images/icons/shuffle.png" alt="shuffle">
              </button>

              <button class="controlButton previous" title="previous button">
                <img src="assets/images/icons/previous.png" alt="previous">
              </button>

              <button class="controlButton play" title="play button" onclick="playSong()">
                <img src="assets/images/icons/play.png" alt="play">
              </button>

              <button class="controlButton pause" title="pause button" style="display:none" onclick="pauseSong()">
                <img src="assets/images/icons/pause.png" alt="pause">
              </button>

              <button class="controlButton next" title="next button" onclick="nextSong()">
                <img src="assets/images/icons/next.png" alt="next">
              </button>

              <button class="controlButton repeat" title="repeat button" onclick="setRepeat()">
                <img src="assets/images/icons/repeat.png" alt="repeat">
              </button>
            </div>

            <div class="playbackBar">
              <span class="progressTime current">0.00</span>

              <div class="progressBar">

                <div class="progressBarBackground">
                  <div class="progress">
                  </div>
                </div>
              </div>

              <span class="progressTime remaining">0.00</span>
            </div>

          </div>
      </div>

      <div id="nowPlayingRightSide">
        <div class="volumeBar">
          <button class="controlButton volume" name="volume slider">
            <img src="assets/images/icons/volume.png" alt="volume slider">
          </button>

          <div class="progressBar">

            <div class="progressBarBackground">
              <div class="progress">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
