<a class='dropdown-button btn' href='#' data-activates='tt_list'>
  <span>Select Class</span>
  <i class="material-icons right">arrow_drop_down</i>
</a>

 <!-- Dropdown Structure -->
 <ul id='tt_list' class='dropdown-content' style="max-height:200px; overflow-y:scroll;">
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

  <div class="row" >
  <div class="col s12" style=" height:355px;overflow:scroll; ">
    <table id="tab" class="bordered">

      <thead id="tb_head">

      </thead>
      <tbody id="table_container">

      </tbody>
  </table>

  </div>
</div>
<div id="load" class="progress teal darken-4 col l12">
    <div class="indeterminate teal "></div>
</div>
<div class="row">
  <div class="col l3">
    <a id="update" class="btn"><span>UPDATE</span></a>
  </div>
  <div class="col l3">
    <a id="allot" class="btn"><span>Allot Teacher</span></a>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    //console.log("yo ");
        $("#load").hide();
        $("#update").hide();
        $("#allot").hide();
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        });

        var jason={};
        var col_n=[];
        var cid="";
        $(".classid").click(function(){
          cid =$(this).data("value");
          $("#update").show();
          $("#allot").show();
          var x=1;
         Cookies.set("clid",cid);
          //alert(Cookies.get("clid"));
          $.post("classtt.php",{clid:cid},function(data){
            var row=0;
            var col=0;
            $("#tb_head").empty();
            $("#table_container").empty();
              //console.log(data);
             $.each(data,function(key,value){
               if(x==1)
               {
                    var index=0;
                    $("#tb_head").append("<tr>");
                      $.each(value,function(colname,colvalue){
                         //console.log(colname);
                         $("#tb_head").append(
                           "<th>"+colname+"</th>");
                           col_n[index]=colname;
                           index++;
                      });
                      //console.log(col_n);
                    $("#tb_head").append("</tr>");
                    x=x+1;
              }
              $("#table_container").append("<tr>");
                col=0;
                var r1=[];
                $.each(value,function(colname,colvalue){
                   //console.log(colname);
                   $("#table_container").append(
                     "<td><span class='block' data-row='"+row+"' data-col='"+col+"'>"+colvalue+"</span></td>" );
                     r1[col]=colvalue;
                     col=col+1;
                });
                jason[row]=r1;
                // console.log(jason);
                row=row+1;
                $("#table_container").append("</tr>");
                //console.log("Created");
              });
              edit_table(jason);

      },"json");

  });
  $('#allot').click(function(){
    $("#maincontainer").load("allot_teacher.php");
  });
  $('#update').click(function(){
        $("#load").show();
    $.post("func_update_class.php",{
            x:jason,
            cid:cid,
            col_n:col_n
            },function(data){
        console.log(data);
            $("#load").hide();
            //console.log(data);
        if(data=="success")
        {
          alert("Table Updated Successfully");
        }
        else {
          alert("Something Went Wrong");
        }
    });
  });

  });
  function edit_table(jason){
    //console.log("dasdasd");
    $(".block").click(function(){

      var par1=$(this).parent();
      var row=$(this).data("row");
      var col=$(this).data("col");
      //console.log(row+"  "+col);
      if(col>0){
      //  console.log(jason[row][col]);
      par1.html("<input type='text' class='edit' data-row='"+row+"' data-col='"+col+"' value='"+jason[row][col]+"'>");
      }
      $('.edit').focus();
      no_editable(jason);
    });
  }

  function no_editable(jason){
    $(".edit").focusout(function(){
      var par1=$(this).parent();
      var row=$(this).data("row");
      var col=$(this).data("col");
      if($(this).val()!="")
      {
        jason[row][col]=$(this).val();

      }
      par1.html("<span class='block' data-row='"+row+"' data-col='"+col+"'>"+jason[row][col]+"</span>");
      edit_table(jason);
    });
  }




</script>
