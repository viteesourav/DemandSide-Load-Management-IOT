<!--
//index.php
!-->

<html>  
    <head>  
        <title>New Appliance Registration</title>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style type="text/css">
          body{
            background: rgb(58,180,125);
            background: linear-gradient(166deg, rgba(58,180,125,1) 45%, rgba(65,184,255,1) 76%);
          }
        </style>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Custom Appliance</a></h3><br />
   <br />
   <br />
   <div align="right" style="margin-bottom:5px;">
      <a href="mainpage.php" class="btn btn-primary btn-xs">Home</a>
      <button type="button" name="add" id="add" class="btn btn-primary btn-xs">Add</button>
   </div>
   <br />
   <form method="post" id="user_form">
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="user_data">
      <tr>
       <th>Appliance</th>
       <th>Number of Units</th>
       <th>Power (in Watts)</th>
       <th>Remove</th>
      </tr>
     </table>
    </div>
    <div align="center">
     <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
    </div>
   </form>

   <br />
  </div>
  <div id="user_dialog" title="Add Data">
   <div class="form-group">
    <label>Appliance Name</label>
    <input type="text" name="appliance" id="appliance" class="form-control" />
    <span id="error_appliance" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Number of Units</label>
    <input type="number" name="units" id="units" class="form-control" min="0" />
    <span id="error_units" class="text-danger"></span>
   </div>
    <div class="form-group">
    <label>Power Rating (in Watts)</label>
    <input type="number" name="rating" id="rating" class="form-control" min="0" />
    <span id="error_rating" class="text-danger"></span>
   </div>
   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">

  </div>
    </body>  
</html> 

<script>  
$(document).ready(function(){ 
 
 var count = 0;

 $('#user_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#user_dialog').dialog('option', 'title', 'Add Data');
  $('#appliance').val('');
  $('#units').val('');
  $('#rating').val('');
  $('#error_appliance').text('');
  $('#error_units').text('');
  $('#error_rating').text('');
  $('#appliance').css('border-color', '');
  $('#units').css('border-color', '');
  $('#rating').css('border-color', '');
  $('#save').text('Save');
  $('#user_dialog').dialog('open');
 });

 $('#save').click(function(){
  var error_appliance = '';
  var error_units = '';
  var error_rating = '';
  var appliance = '';
  var units = '';
  var rating = '';
  if($('#appliance').val() == '')
  {
   error_appliance = 'Appliance name is required';
   $('#error_appliance').text(error_appliance);
   $('#appliance').css('border-color', '#cc0000');
   appliance = '';
  }
  else
  {
   error_appliance = '';
   $('#error_appliance').text(error_appliance);
   $('#appliance').css('border-color', '');
   appliance = $('#appliance').val();
  } 
  if($('#units').val() == '')
  {
   error_units = 'Number of Units required';
   $('#error_units').text(error_units);
   $('#units').css('border-color', '#cc0000');
   units = '';
  }
  else
  {
   error_units = '';
   $('#error_units').text(error_units);
   $('#units').css('border-color', '');
   units = $('#units').val();
  }
  if($('#rating').val() == '')
  {
   error_rating = 'Power Rating required';
   $('#error_rating').text(error_rating);
   $('#rating').css('border-color', '#cc0000');
   rating = '';
  }
  else
  {
   error_rating = '';
   $('#error_rating').text(error_rating);
   $('#rating').css('border-color', '');
   rating = $('#rating').val();
  }
  if(error_appliance != '' || error_units != '' || error_rating != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+appliance+' <input type="hidden" name="hidden_appliance[]" id="appliance'+count+'" class="appliance" value="'+appliance+'" /></td>';
    output += '<td>'+units+' <input type="hidden" name="hidden_units[]" id="units'+count+'" value="'+units+'" /></td>';
    output += '<td>'+rating+' <input type="hidden" name="hidden_rating[]" id="rating'+count+'" value="'+rating+'" /></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#user_data').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+appliance+' <input type="hidden" name="hidden_appliance[]" id="appliance'+row_id+'" class="appliance" value="'+appliance+'" /></td>';
    output += '<td>'+units+' <input type="hidden" name="hidden_units[]" id="units'+row_id+'" value="'+units+'" /></td>';
    output += '<td>'+rating+' <input type="hidden" name="hidden_rating[]" id="rating'+row_id+'" value="'+rating+'" /></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#user_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var appliance = $('#appliance'+row_id+'').val();
  var units = $('#units'+row_id+'').val();
  var rating = $('#rating'+row_id+'').val();
  $('#appliance').val(appliance);
  $('#units').val(units);
  $('#rating').val(rating);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#user_dialog').dialog('option', 'title', 'Edit Data');
  $('#user_dialog').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

 $('#user_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.appliance').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#user_data').find("tr:gt(0)").remove();
     $('#action_alert').html('<p>Data Inserted Successfully</p>');
     $('#action_alert').dialog('open');
    }
   })
  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });
 
});  
</script>
