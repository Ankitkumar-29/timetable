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
    <table id="tab" class="bordered">

      <thead id="tb_head">

      </thead>
      <tbody id="table_container">

      </tbody>
  </table>

  </div>
</div>
<a id="update" class="btn"><span>UPDATE</span></a>

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

        var jason={};
        var col_n=[];
        var cid="";
        $(".classid").click(function(){
          cid =$(this).data("value");
          var x=1;
          $.post("classtt.php",{clid:cid},function(data){
            var row=0;
            var col=0;
            $("#tb_head").empty();
            $("#table_container").empty();
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
                      console.log(col_n);
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
                //console.log(jason);
                row=row+1;
                $("#table_container").append("</tr>");
                //console.log("Created");
              });
              edit_table(jason);

      },"json");

  });

  $('#update').click(function(){
    $.post("func_update_class.php",{
            x:jason,
            cid:cid,
            col_n:col_n
            },function(data){
        console.log(data);
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
      console.log(row+"  "+col);
      if(col>0){
        //console.log("clicked");
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


  // function abc(testjson) {
  //   $(".random1").on("click",function(){
  //     // console.log($(this).data("value1"));
  //     var par=$(this).parent();
  //     var row=$(this).data("row");
  //     var col=$(this).data("col");
  //     // console.log(par);
  //     par.html("<input type='text' class='ss' id='t1' value='"+testjson[row][col]+"' autofocus>");
  //     $(".ss").focus();
  //     xyz(row,col,testjson);
  //   });
  // }
  //
  // function xyz(row,col,testjson){
  //   $(".ss").focusout(function(){
  //     var par=$(this).parent();
  //     if($(this).val()!=""){
  //       testjson[row][col]=$(this).val();
  //     }
  //     par.html("<span class='random1' data-row='"+row+"' data-col='"+col+"'>"+testjson[row][col]+"</span>");
  //     abc(testjson);
  //   });
  //
  // }

</script>
