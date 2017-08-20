<?php
include 'bin/validate.php';

  if(validate())
  {
  header("Location: bin/header.php");
  }

?>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="msapplication-tap-highlight" content="no">
   <link href="css/materialize.css" rel="stylesheet" type="text/css">
 <link  rel="stylesheet" href="fonts/icons/icon.woff2" >
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="js/materialize.js"></script>
 </head>

 <body class="back">
      <div calss="row">
        <nav class="col l12 teal darken-3 z-depth-1">
          <div class="center" style="color:white; padding-top:5; font-family:Arial; font-weight:bold; font-size:200%;">TIME TABLE</div>
        </nav>
      </div>

      <div id="log_page" class="col l6 right" style="margin-top:10%;">
            <div style="padding-right:50px">
                <form class="login-form">
                  <div class="row margin">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="username" type="text">
                        <label for="username">Username</label>
                      </div>
                    </div>

                    <div class="row margin">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="passwd" type="password">
                        <label for="passwd">Password</label>
                      </div>
                    </div>
                    <div class="center">

                    </div>
                    <div class="center">
                    <a id="login" class="btn" href="#">Login</a>
                    <a id="reg" href="#"><span style="margin-left:6%;">Register</span></a>
                  </div>
                </form>
            </div>
          </div>

          <!-- register page  -->
          <div id="register_page" class="col l6 right" style="margin-top:10%;">
                <div style="padding-right:50px">
                    <form class="login-form">
                      <div class="row margin">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="username" type="text">
                            <label for="username">Username</label>
                          </div>
                        </div>
                        <div class="center">

                      </div>
                        <div class="center">
                        <a id="Register" class="btn" href="#">Register</a>
                        <a id="log" href="#"><span style="margin-left:6%;">Login</span></a>
                        </div>
                    </form>
                </div>
              </div>


<script type="text/javascript">
       $(document).ready(function() {

         $("#register_page").hide();
         $("#login").click(function(){


           $.post("bin/loginvalidate.php",{userid:$("#username").val(),pass:$("#passwd").val()},function(data){

             if(data=="success"){
               window.open("bin/header.php","_self");
             }
             else if (data=="failed") {
               alert("Login failed.Invalid username or Password");
             }
             else {
               alert("Something went wrong!Please refresh your browser");
             }
           });
        });

        $("#reg").click(function(){
              $("#log_page").hide();
              $("#register_page").show();
        });
        $("#log").click(function(){
              $("#register_page").hide();
              $("#log_page").show();
          });
});




   </script>
 </body>
</html>
