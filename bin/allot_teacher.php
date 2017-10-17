<div class="row">
  <div class="card-panel teal col l12 s12 m12">
    <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">ALLOT TEACHERS</div>
  </div>

  </div>
  <div class="col s12 m6 l6 ">
    <table id="table" class="bordered ">

      <thead>
          <th>SUBJECT</th>
          <th>TEACHER</th>
      </thead>
      <tbody id="tb_container">

      </tbody>
    </table>

  </div>
    <!-- <div class="col s12 m6 l6">
     <div class="row">
        <div class="sub input-field col s6 m6 l6">
          <input  value="" type="text" readonly>
        </div>
        <div class="input-field col s6 m6 l6">
            <input class="tech" type="text" value="">
        </div>
     </div>
    </div> -->


    <!-- <div class="input-field col s12 m6 l3">
       <i class="material-icons prefix">account_circle</i>
       <input id="search" type="text">
       <label for="search"></label>
     </div>
   </div> -->



<script type="text/javascript">
  $(document).ready(function(){
    var srch ="";
    var x=Cookies.get("clid");
    var jason={};
    $.post("func_get_sub_teach.php",{clid:x},function(data){

      var row=0;
      var col=0;
     $("#tb_container").empty();
        $.each(data,function(key,value){
            var r=[];
            col=0;

            $("#tb_container").append("<tr>");
          $.each(value,function(colname,colvalue){
                  //console.log(colvalue);
              $("#tb_container").append(
                "<td>"+
                "<span class='block tech' data-row='"+row+"' data-col='"+col+"' >"+colvalue+"</span>"+
                "</td>" );
                r[col]=colvalue;

                col=col+1;
            });
              //console.log(r);
            jason[row]=r;
           console.log(jason);
            row=row+1;
          $("#tb_container").append("</tr>");
          });
          edit_table(jason);
     },"json");
    //alert(x);



    function edit_table(jason){
      //console.log("dasdasd");
      $(".block").click(function(){

        var par1=$(this).parent();
        var row=$(this).data("row");
        var col=$(this).data("col");
      //  console.log(row+"  "+col);
        if(col>0){
          //console.log(jason[row][col]);
        par1.html("<input type='text' class='edit search' data-row='"+row+"' data-col='"+col+"' value='"+jason[row][col]+"'>");
        }
        $('.edit').focus();
        search();
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
  });

  function search()
  {
    $(".search").keyup(function(e) {

        if(e.key.length==1){
        srch=$(".search").val();
        console.log(srch);
        }
        else {
          srch=$(this).val();
        }
        console.log(srch);
      $.post("func_teach_search.php",{key:srch},function(data){
        //alert(data);
        console.log(data);
      },"json");
        //console.log(srch);
    });

  }

 $(".tech").click(function(){
    console.log($(this).val());
  });
</script>
