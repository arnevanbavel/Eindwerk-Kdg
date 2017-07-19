    $(document).ready(function() {

    $('#profiel_aboutMe').keyup(function(){
      var value = $('#profiel_aboutMe').val();
      $('.preview-profiel_aboutMe').html(value);
    });

    $('textarea').keyup(updateCount);
    $('textarea').keydown(updateCount);

    function updateCount() {
        var maxchar = 300;
        var cs = $(this).val().length;
        cs = 300 - cs;
        $('#characters').text((cs + ' Remaining'));
    }

    $('#profielBackgroundColor').colorpicker();

    $('#profiel_background_color').on('change', function() {
      var value = $('#profiel_background_color').val();
      $('.profiel_default_tmp').css('background', value);
    });
});