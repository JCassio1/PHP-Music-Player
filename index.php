<?php

require("includes/config.php"); //include in order to start session

//session_destro(); //method to logout manually (temporary solution [Will cause issues at login if uncommented])

if (isset($_SESSION['userLoggedIn'])){
  $userLoggedIn = $_SESSION['userLoggedIn'];
}

//If session does not start then user cannot access this page
else{
  header("Location: register.php");
}

?>

  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>JDMusic</title>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
      <div id="mainContainer">

        <div id="topContainer">

           <div id="navBarContainer">
             <nav class="navBar">
               <a href="index.php" class="logo">
                 <img src="assets/images/logo/jdMusicLogo.png" alt="jdMusicLogo">
               </a>

               <div class="group">
                 <div class="navItem">
                   <a href="search.php" class="navItemLink">Search <img src="assets/images/icons/search.png" class="icon" alt="search"></a>
                 </div>

               </div>

               <div class="group">

                 <div class="navItem">
                   <div class="navItem">
                     <a href="browse.php" class="navItemLink">Browse</a>
                   </div>

                   <div class="navItem">
                     <a href="yourMusic.php" class="navItemLink">Your Music</a>
                   </div>
                   <div class="navItem">
                     <a href="Profile.php" class="navItemLink">Joselson Dias</a>
                   </div>

                 </div>
               </div>
             </nav>

           </div>

        </div>

        <div id="playingBarContainer">

            <div id="playingBar">

              <div id="nowPlayingLeftSide">
                <div class="content">
                  <span class="albumLink">
                    <img src="https://i1.sndcdn.com/artworks-000235926242-q4hojq-t500x500.jpg" class="albumArtwork" alt="nowPlaying">
                  </span>

                  <div class="trackInformation">

                    <span class="trackName">
                      <span> Mandume</span>
                    </span>

                    <span class="artistName">
                      <span> Milly Mizzy</span>
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

                      <button class="controlButton play" title="play button">
                        <img src="assets/images/icons/play.png" alt="play">
                      </button>

                      <button class="controlButton pause" title="pause button" style="display:none">
                        <img src="assets/images/icons/pause.png" alt="pause">
                      </button>

                      <button class="controlButton next" title="next button">
                        <img src="assets/images/icons/next.png" alt="next">
                      </button>

                      <button class="controlButton repeat" title="repeat button">
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

      </div>
    </body>
  </html>
