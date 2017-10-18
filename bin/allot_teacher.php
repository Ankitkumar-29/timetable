<div class="row">
  <div class="card-panel teal col l12 s12 m12">
    <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">ALLOT TEACHERS</div>
  </div>

  </div>
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
  </ul>

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
  <div class="row">
    <div class="col s12 m6 l6">
    <a id="upteach" class="btn" >UPDATE</a>
    </div>

  </div>

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
           //console.log(jason);
            row=row+1;
          $("#tb_container").append("</tr>");
          });
          edit_table(jason);
     },"json");
    //alert(x);

    $("#upteach").click(function(){
      $.post("func_insert_teach.php",{
        content:jason,
        sclid:x
        },function(data){
        console.log(data);
        if(data=="success")
        {
          alert("Teacher added Successfully");
        }
        else {
          alert("Something went wrong");
        }
      });
    });


    function edit_table(jason){
      //console.log("dasdasd");
      $(".block").click(function(){

        var par1=$(this).parent();
        var row=$(this).data("row");
        var col=$(this).data("col");
      //  console.log(row+"  "+col);
        if(col>0){
          //console.log(jason[row][col]);
        par1.html("<input type='text' class='edit search autocomplete' data-row='"+row+"' data-col='"+col+"' value='"+jason[row][col]+"'>"+
        "<div id='main_content'></div>"
        );
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

    $.post("func_teach_search.php",{key:srch},function(content){
        $('input.autocomplete').autocomplete({
          data:content,
          limit: 3, // The max amount of results that can be shown at once. Default: Infinity.
          minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
          });
      },"json");
    });
  }

 $(".tech").click(function(){
    console.log($(this).val());
  });
</script>
