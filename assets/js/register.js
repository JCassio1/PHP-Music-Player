$(document).ready(function(){ // loads as soon as the document is ready

  // console.log("Document is ready!"); //I'm here to test if jquery is working ;)

  $("#hideLogin").click(function(){
    $("#loginForm").hide();
    $("#registerForm").show();
  });

  $("#hideRegister").click(function(){
    $("#loginForm").show();
    $("#registerForm").hide();
  });
});
