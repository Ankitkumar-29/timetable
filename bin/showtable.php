<a class='dropdown-button btn' href='#' data-activates='tt_list'>
  <span>Select Class</span>
  <i class="material-icons right">arrow_drop_down</i>
</a>

 <!-- Dropdown Structure -->
 <ul id='tt_list' class='dropdown-content'>
   <?php
   include "dbconn.php";
   $qry="SELECT * FROM `Classes` ";
   $res=$conn->query($qry);
   if(mysqli_num_rows($res)>0)
   {
     while($row = $res->fetch_assoc())
     {
  ?>
   <li><a class="classid" data-value="<?php echo $row['classid']; ?>" href="#!"><?php echo $row['classid']; ?></a></li>
  <?php
    }
  }
   ?>
     </ul>

  <div class="row" style=" height:500px;overflow:scroll;">
  <div class="col s12">
    <table  class="bordered">

      <thead id="tb_head">

      </thead>
      <tbody id="table_container">

      </tbody>
  </table>

  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    console.log("yo bby");
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        });


        $(".classid").click(function(){
          var cid =$(this).data("value");
          var x=1;
          $.post("classtt.php",{clid:cid},function(data){
            //alert(x);
            $("#tb_head").empty();
            $("#table_container").empty();
             $.each(data,function(key,value){
               if(x==1)
               {

                    $("#tb_head").append("<tr>");
                      $.each(value,function(colname,colvalue){
                         console.log(colname);
                         $("#tb_head").append(
                           "<th>"+colname+"</th>");
                      });
                    $("#tb_head").append("</tr>");
                    x=x+1;
              }
              $("#table_container").append("<tr>");
                $.each(value,function(colname,colvalue){
                   console.log(colname);
                   $("#table_container").append(
                     "<td>"+colvalue+"</td>" );
                });
                $("#table_container").append("</tr>");
              });
      },"json");

    });
  });


</script>
