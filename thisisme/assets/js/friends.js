$(document).ready(function() {

      $('.RemoveButton').click(function(e) {
        e.preventDefault(); 
        var memberusername = $(this).attr("data-memberusername");
        $.ajax({
              type: "POST",
              url: "./processes/ajax-friendRequest.php",
              data: { toDo: 'remove', meberUsername: memberusername },
              cache: false,
              success: function(data){
                $('#div-'+memberusername).hide(500);
              }
        }); 
      }); 

      $('.AcceptButton').click(function(e) {
        e.preventDefault(); 
        var memberusername = $(this).attr("data-memberusername");
        $.ajax({
              type: "POST",
              url: "./processes/ajax-friendRequest.php",
              data: { toDo: 'accept', meberUsername: memberusername },
              cache: false,
              success: function(data){
                $('#div-'+memberusername).hide(500);
                var friendcounter = $("div[id^='FriendDiv-']").index();
                if (friendcounter >= 0) {
                $("div[id^='FriendDiv-']:last" ).after(data);
                }else{
                  $(".friendsColumm" ).html(data);
                }
              }
        }); 
      });

      $('.friendsColumm').on('click','.DeleteButton',function(e) {
        e.preventDefault(); 
        var memberusername = $(this).attr("data-memberusername");
        $.ajax({
              type: "POST",
              url: "./processes/ajax-friendRequest.php",
              data: { toDo: 'delete', meberUsername: memberusername },
              cache: false,
              success: function(data){
                $('#FriendDiv-'+memberusername).hide(500);
              }
        }); 
      }); 

    }); 