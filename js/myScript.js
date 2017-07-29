var sv="";
var unid;
$(document).ready(function(){
  function fetch_data()
  {
    $.ajax({
      url:"php/select.php",
      method:"POST",
      success:function(data){
        $('#disp_data').html(data);
      }
    });
  }
  fetch_data();

  $(document).on('click', '#SB', function(){
    var first_name = $("#fname").val();
    var last_name = $('#lname').val();
    var phone= $('#phone').val();
    var email= $('#email').val();
    var comment= $('#comment').val();
    var selection= $('#selection').val();
    $.ajax({
      url:"php/insert.php",
      method:"POST",
      data:{first_name:first_name, last_name:last_name,phone:phone,email:email,selection:selection,comment:comment},
      dataType:"text",
      success:function(data)
      {
        console.log(data);
        fetch_data();
      }
    })
  });

  $(document).on('click', '#delete', function(){
    var id=$(this).data("id7");
    $.ajax({
      url:"php/delete.php",
      method:"POST",
      data:{id:id},
      dataType:"text",
      success:function(data){
        console.log(data);
        fetch_data();
      }
    });
  });

  $(document).on('click', '#edit', function(){
    var id=$(this).data("id8");
    unid=id;
    $.ajax({
      url:"php/edit.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data){
        document.getElementById("fname1").value = data.first_name;
        document.getElementById("lname1").value = data.last_name;
        document.getElementById("phone1").value = data.phone;
        document.getElementById("email1").value = data.email;
        document.getElementById("selection1").value = data.selection;
        document.getElementById("comment1").value = data.comment;
      }
    });
  });

  $(document).on('click', '#update', function(){
    var id=unid;
    var first_name = $("#fname1").val();
    var last_name = $('#lname1').val();
    var phone= $('#phone1').val();
    var email= $('#email1').val();
    var comment= $('#comment1').val();
    var selection= $('#selection1').val();
    $.ajax({
      url:"php/update.php",
      method:"POST",
      data:{id:id,first_name:first_name, last_name:last_name,phone:phone,email:email,selection:selection,comment:comment},
      dataType:"text",
      success:function(data)
      {
        console.log(data);
        fetch_data();
      }
    })
  });

});
