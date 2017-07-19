  $(document).ready(function() {
    var lastimage = "";
  
  $('#header_bigSentence').keyup(function(){      //Wanneer er getypt word tonen
    var value = $('#header_bigSentence').val();
    $('.preview-bigSentence').html(value);
  });

  $('#header_smallSentence').keyup(function(){
    var value = $('#header_smallSentence').val();
    $('.preview-smallSentence').html(value);
  });

  $(':checkbox').click(function() {                   //enable input wanneer default is afgevinkt
    $('#header_upload_image').attr('disabled',this.checked);
    if ($(':checkbox').is(':checked')) {
      $('.header_default_tmp').css('background-image', 'url(./assets/img/header_backgrounds/default_tmp.jpg)');
      $('.header_hipster_tmp').css('background-image', 'url(./assets/img/header_backgrounds/hipster_tmp.jpg)');
      $('.header_night_tmp').css('background-image', 'url(./assets/img/header_backgrounds/night_tmp.jpg)');
      $('.header_rocky_tmp').css('background-image', 'url(./assets/img/header_backgrounds/rocky_tmp.jpg)');
      $('.header_music_tmp').css('background-image', 'url(./assets/img/header_backgrounds/music_tmp.jpg)');
    }else
    {
      if (lastimage == "") {
        $('#header-section:last-child').css('background', 'black');
        $('#header-section:last-child').css('background-size', 'cover');
      }else{
        $('#header-section:last-child').css('background-image', 'url(' + lastimage + ')');
        $('#header-section:last-child').css('background-size', 'cover');
      }
    }
  });

  $(".form-area").on('change', '#header_upload_image',function(e) {
        readURL(this);
    });

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                lastimage = e.target.result ;
                $('#header-section:last-child').css('background-image', 'url('+e.target.result +')');
                $('#header-section:last-child').css('background-size', 'cover');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

});