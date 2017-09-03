<div class="row">
  <div class="card-panel teal">
    <span style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">ADD NEW CLASS</span>
  </div>

  <form>
        <div class="input-field col l6 s12 m6">
          <input id="cls" type="text" name="" value="">
          <label for="cls">Class</label>
        </div>
        <div class="input-field col l6 s12 m6">
          <input id="sec" type="text" name="" value="">
          <label for="sec">Section</label>
        </div>
        <div class="input-field col l6 s12 m6">
          <input id="lec" type="text" name="" value="">
          <label for="lec">No of lecture</label>
        </div>
        <div class="input-field col l6 s12 m6">
          <input id="rec" type="text" name="" value="">
          <label for="rec">Reccess after lecture</label>
        </div>
  </form>

  <div id="load" class="progress teal darken-4 col l12">
      <div class="indeterminate teal "></div>
  </div>

  <div class="col l12">
    <a id="add" class="btn" href="#"><span>Add</span></a>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#load").hide();
    $("#add").click(function(){
        //alert("clicked");
        $("#load").show();
      $.post("func_add_c.php",{
              cls:$("#cls").val(),
              sec:$("#sec").val(),
              lec:$("#lec").val(),
              rec:$("#rec").val()
            },function(data){
            //  alert(data);
            $("#load").hide();
              if(data=="unfilled")
              {
                alert("Please fill all the details");
              }
              else if (data=="success"){
                alert("New Class is Created");
              }
              else if(data=="numeric")
              {
                alert("Please Input Numeric Value in fields(3 and 4)")
              }
              else {
                alert("Something went wrong please refresh your browser");
              }
            });
        });
  });
</script>
