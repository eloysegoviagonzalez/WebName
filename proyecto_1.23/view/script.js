import './query.min.js';

$(document).ready(function() { 
  function opt_printer(){
    var catalogue = [];
    $.ajax({
      url: "http://127.0.0.1:5000/main/displayer", // Especifica la URL de tu servidor Flask
      type: "POST", // Usa el método POST
      contentType: "application/json",
      success: function(response) {
        $('#lang').empty()
        $('#lang').append('<option value=0>new slot</option>');
        catalogue = response;
        console.log(catalogue);
        $.each(catalogue, function(index, value) { 
          $('#lang').append('<option value="' + value + '"> value ' + value + '</option>');
        });
        
          
      },
      error: function(xhr, status, error) {
        // Manejar cualquier error
        console.error("Error at sending data to the client", error);
      }    
    });
}
});
