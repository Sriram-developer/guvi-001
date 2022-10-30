$(document).ready(function() {
    $('#regform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'registration_ajax.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'index.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});