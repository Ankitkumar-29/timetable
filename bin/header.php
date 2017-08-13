<?php

 ?>
<html>
  <head>
    <title>Time Table</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <link href="../css/materialize.css" rel="stylesheet" type="text/css">
      <link href="../css/style.css" rel="stylesheet" type="text/css">
      <link  rel="stylesheet" href="../fonts/icons/icon.woff2" >
      <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/materialize.js"></script>

  </head>

  <body class="back">

    <header>
      <nav class="teal darken-3 ">
           <div class="row">
               <div>
                 <a class="button-collapse waves-effect waves-light left" href="#!" data-activates="slide-out" id="sidenavshow" style="display:block">
                 <i class="material-icons left">menu</i></a>
              </div>
            </div>
       </nav>
    </header>

    <div class="row">
          <ul id="slide-out" class="side-nav" >
          <li>
            <div class="bg" style="display:flex; justify-content:center;">
             <img src="../sources/images/logos/logoiimt.png" alt="">
            </div>
          </li>
          <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
          <li><a href="#!">Second Link</a></li>
          <li><div class="divider"></div></li>
          <li><a class="subheader">Subheader</a></li>
          <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
     </div>


  </body>

  <script type="text/javascript">
    $(document).ready(function(){

       $(".button-collapse").sideNav();

    });
  </script>
</html>
