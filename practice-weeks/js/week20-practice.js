$(document).ready( function () {
  $('#wide-tableA').DataTable({
      'autowidth': false
  });
  $('#wide-tableB').DataTable({
      'autowidth': false
  });
});

$('#cust_pop').submit(function(event){
  event.preventDefault();

  $.ajax({
    url: 'week-20-php/get_customer.php',
    type: 'GET',
    data: $('#cust_pop').serialize(),
    dataType: 'json',
    success: function(response){
      if(response == null){
        alert("No customer found with this ID");
      }
      for(key in response){
        $(`input[name="${key}"]`).val(response[key]);
      }
    },
    error: function(response){
      alert('Request failed');
    }
  });
});
