    $(document).ready(function() {

      var Zoekwoord = $('#ZoekVeld').val();
        if (Zoekwoord) {
            $.ajax({
              type: "POST",
              url: "./processes/ajax-search.php",
              data: { searchString: Zoekwoord },
              cache: false,
              success: function(data){
                 $("#resultarea").html(data);
                 $("#ZoekVeld").focus();
              }
            });
        }else{
            $("#resultarea").html('');
        }

        var input = $("#ZoekVeld");
        var len = input.val().length;
        input[0].focus();
        input[0].setSelectionRange(len, len);

    $(window).on('resize', function() {
        if($(window).width() < 601) {
            $('.photo.photo1 img').addClass('profileimg2');
            $('.photo.photo1 img').removeClass('profileimg');
        }else{
            $('.photo.photo1 img').addClass('profileimg');
            $('.photo.photo1 img').removeClass('profileimg2');
        }
    })
  
    $('#ZoekVeld').keyup(function(){      //Wanneer er getypt word tonen
      var value = $(this).val();
        if (value) {
            $.ajax({
              type: "POST",
              url: "./processes/ajax-search.php",
              data: { searchString: value },
              cache: false,
              success: function(data){
                 $("#resultarea").html(data);
              }
            });
        }else{
            $("#resultarea").html('');
        }
      });

    }); 