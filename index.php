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
      <div id="playingBarContainer">

          <div id="playingBar">

            <div id="nowPlayingLeftSide">

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

                </div>
            </div>

            <div id="nowPlayingRightSide">

            </div>

          </div>
      </div>
    </body>
  </html>
