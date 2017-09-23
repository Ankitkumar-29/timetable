<div class="row">
    <div class="card-panel teal col l12 s12 m12">
      <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">Add Teachers</div>
    </div>

   <div class="col l3 s12 m6">
      <form class="login-form">
        <div class="input-field">
          <label for="id">Teacher Id</label>
          <input id="id" type="text" autofocus>
        </div>
        <div class="input-field" >
          <label for="name">Name</label>
          <input id="name" type="text">
        </div>
      </form>
      <div class="col l3 s12 m6">
        <a id="add" class="btn" href="#"><span>ADD</span></a>
      </div>
     </div>
  </div>
<script type="text/javascript">
  $(document).ready(function(){

      $("#add").click(function(){
        alert("click");
        $.post("func_add_t.php",{name:$("#name").val(),id:$("#id").val()},function(data){
          alert(data);
          if(data=="success")
          {
            alert("Teacher added succcessfully");
          }
          else if (data=="failed")
          {
              alert("Teacher already exist");
          }
          else {
            alert("Please enter all the fields");
          }
        });
      });
  });
</script>
