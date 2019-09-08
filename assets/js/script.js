
var currentPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;

function formatTime(seconds){

  // Round will aproximate the number. For example, 8.4s = 8s
  var time = Math.round(seconds);
  var minutes = Math.floor(time/60); //similar to round
  var seconds = time - (minutes * 60);

  var extraZero = (seconds < 10) ? "0" : "";

  return minutes + ":" + extraZero + seconds;
}

//Function to update track current time
function updateTimeProgressBar(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    var progress = audio.currentTime / audio.duration * 100; //calculate percentage of track progress

    $(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio){
  var volume = audio.volume * 100; //gets the percentage of the volume decimal number
  $(".volumeBar .progress").css("width", volume + "%");
}


function Audio() {

  this.currentlyPlaying;
  this.audio = document.createElement('audio'); //this will trigger event listeners

  this.audio.addEventListener("canplay", function() {

    var duration = formatTime(this.duration);

    // The word 'this' is refering to the object that the event was called on
    $(".progressTime.remaining").text(duration);

  });

  this.audio.addEventListener("timeupdate", function(){

    if(this.duration){
      updateTimeProgressBar(this);
    }

  });

  this.audio.addEventListener("volumechange", function(){
      updateVolumeProgressBar(this);
  });

  this.setTrack = function(track){
    this.currentlyPlaying = track;
    this.audio.src = track.path;
  }

  this.play = function(){
    this.audio.play();
  }

  this.pause = function() {
    this.audio.pause();
  }

  this.setTime = function(seconds) {
    this.audio.currentTime = seconds;
  }

}
