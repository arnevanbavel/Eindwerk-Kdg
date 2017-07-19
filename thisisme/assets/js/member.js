    $(document).ready(function() {

      $('.friendArea').on('click', '#Friend' ,function(e) {
        e.preventDefault();

        var memberusername = $(this).attr("data-memberdata");
        var toDo = $(this).attr('class');
        $.ajax({
              type: "POST",
              url: "./processes/ajax-friendRequest.php",
              data: { toDo: toDo, meberUsername: memberusername },
              cache: false,
              success: function(data){
                $( "#Friend" ).replaceWith(data);
              }
        }); 
      });

      var replace = "";
      $('.friendArea').on('mouseover','.pending',function(e){
          replace = $(this).text();
          $(this).text("Remove");
      });
      $('.friendArea').on('mouseleave','.pending',function(e){
          $(this).text(replace);
      });

    }); 