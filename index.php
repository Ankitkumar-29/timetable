<?php
 ?>
<html>
  <head>
  <title>Time Table</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link href="css/materialize.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link  rel="stylesheet" href="fonts/icons/icon.woff2" >

    </head>

  <body class="back">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <!-- header  -->
     <header>
       <nav class="col l12 teal darken-3 z-depth-1">
         <div class="center" style="color:white; padding-top:5; font-family:Arial; font-weight:bold; font-size:200%;">TIME TABLE</div>
       </nav>
     </header>
     <!-- header finish  -->

     <!-- page content  -->
     <div class="row ">
         <div class="col l6">

        </div>
         <div class="col l6 " style="height:80vh;">
            <form class="login-form" action="index.html" method="post">
              <div id="user" class="col l6 s12 right input-field" style="margin-top:100px;">
                <i class="material-icons prefix">account_circle</i>
                <input id="username" type="text">
                <label for="username"><span>UserName</span></label>
              </div>
              <div id="pass" class="col l6 s12 right input-field" style="margin-top:10px; margin-left:20px;">
                <i class="material-icons prefix">lock_open</i>
                <input id="passwd" type="password">
                <label for="passwd"><span>Password</span></label>
              </div>
              <div  class="col l6 s12" style="margin-top:15px; margin-left:56%;">
                <a id="login" class="wave-effect btn" href="">Login</a>
              </div>
            </form>

         </div>
    </div>
    <!-- page content finish -->
    </body>

    <script type="text/javascript">

      $(document).ready(function(){

        $("#login").click(function(){

         $.post("bin/loginvalidate.php",{

            userid:$("#username").val(),
            pass:$("#passwd").val()
            },function(data){
              alert("data");
            //  window.open("bin/header.php","_self");
            // if(data=="success"){
            //   window.open("bin/header.php","_self");
            // }
            // else if (data=="failed") {
            //   alert("Login failed.Invalid username or Password");
            //
            // }
            // else {
            //   alert("Something went wrong!Please refresh your browser");
            // }
          });

        });
      });

    </script>

</html>
