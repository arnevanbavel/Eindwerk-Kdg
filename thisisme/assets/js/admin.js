  $(document).ready(function() {
    $('#example').DataTable();

    $('.DeleteUser').click(function(e) {
      e.preventDefault();
      var memberusername = $(this).attr("data-username");
        $.ajax({
              type: "POST",
              url: "./processes/ajax-random.php",
              data: { toDo: 'deleteUserFromDb', memberusername: memberusername },
              cache: false,
              success: function(data){
                if (data) {
                  $( ".row-"+memberusername ).hide(500);
                }
              }
        }); 
    });

} );