 
 <?php

include_once 'header.php';
?>

<html>
 <head>
  <title>Write to put users in database</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <style type="text/css"></link>
  body
  {
   margin:0px;
   padding:0;
   background-color:#f1f1f1;
  }
  table {
        border-collapse: collapse;
        color: #000;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
         
    }
    th {
        background-color:#e46900;
        color: white;
    }
    tr:nth-child(even)  {background-color:#f2f2f2}

  .box
  {
   width:80%;
   padding:30px; 
   margin-top:30px;
   background-color:
   border:0px solid ;
   border-radius:20px;
  
   box-sizing:border-box: 130px;
  color: black;
  padding-bottom: 122px;
  }

   
  </style>
 </head>
 <body style="background-image:url(photo/11.png)">
   
  <div class="container w3-teal" style="opacity: 0.80" >
     
   <h1 align="center" style="color:orange">Write to put product in database</h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info"><h4>Add</h4></button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped" >
     <thead>
      <tr>
       <th>Name</th>
       <th>ID Product</th>
       <th></th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"prdDB/fetch.php",
     type:"POST"
    }
   });
  }
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });

  $(document).on('click', '#insert', function(){
   var first_name = $('#data1').text();
   var last_name = $('#data2').text();
   if(first_name != '' && last_name != '')
   {
    $.ajax({
     url:"prdDB/insert.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   //update_data(id, column_name, value);
   $.ajax({
     url:"prdDB/update.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
  });

  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"prdDB/delete.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
   /* setInterval(function(){
     $('#alert_message').html('');
    }, 5000);*/
   }
  });

 });
  </script>