    $(document).ready(function() {

    var beginBars = $('.skillEdite').length;

    var skillbackground = $('#skill_background_color').val();
      $('.skill_default_tmp').css('background', skillbackground);

    var skillColor = $('#skill_color').val();
    $('.preview-section-title').css('color', skillColor);

    var a = 1;
    for (var i = 0; i < beginBars; i++) 
    {
      $( ".skillbar:eq("+i+")" ).show(1000);  //Tonen van aantal skill bars aan de start

      var skill     = $( "#skill"+a).val();
      $('.preview-skillTitle:eq('+i+')').html(skill);

      var skillPerc = $( "#skill"+a+"percent").val();
      $('.preview-skillScore:eq('+i+')').html(skillPerc+'%');
      $('.preview-skillbar').data('percent', skillPerc+"%");

      var skillColor= $( "#skill"+a+"Color").val();
      $('.skillbar-title:eq('+i+')').css('background-color', skillColor);
      $('.skillbar-bar:eq('+i+')').css('background-color', skillColor);
      a++;
    }

    $('#skillBackgroundColor').colorpicker($colorPallet);
    $('#skillColor').colorpicker($colorPallet);
    $('#skill1BG').colorpicker($colorPallet);
    $('#skill2BG').colorpicker($colorPallet);
    $('#skill3BG').colorpicker($colorPallet);
    $('#skill4BG').colorpicker($colorPallet);
    $('#skill5BG').colorpicker($colorPallet);
    $('#skill6BG').colorpicker($colorPallet);
    $('#skill7BG').colorpicker($colorPallet);
    $('#skill8BG').colorpicker($colorPallet);
    $('#skill9BG').colorpicker($colorPallet);
    $('#skill10BG').colorpicker($colorPallet);

    $('#skill_background_color').on('change', function() {
      var value = $('#skill_background_color').val();
      $('.skill_default_tmp').css('background', value);
    });

    $('#skill_color').on('change', function() {
      var value = $('#skill_color').val();
      $('.preview-section-title').css('color', value);
    });

    $('.form-area').on('keyup','.skill_name', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".skill_name" ).index(this);
      $('.preview-skillTitle:eq('+numItems+')').html(value);
    });

    $('.form-area').on('keyup','.skill_score', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".skill_score" ).index( this );
      $('.preview-skillScore:eq('+numItems+')').html(value+'%');
      $('.preview-skillbar').data('percent', value+"%");
    });

    $('.form-area').on('change','.skill_color', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".skill_color" ).index( this );
      $('.skillbar-title:eq('+numItems+')').css('background-color', value);
      $('.skillbar-bar:eq('+numItems+')').css('background-color', value);
    });

    $('.addSkill').click(function(e) {
      e.preventDefault(); 
      var numItems = $('.skillEdite').length;
      ++numItems;
      if (numItems < 11) {
        //Add skill bar menu
        $( ".skillEdite:last" ).after( "<div class='row skillEdite'><div class='col-xs-8 col-sm-8 col-md-8'><div class='form-group'><input type='text' name='skill"+numItems+"' id='skill"+numItems+"' class='form-control input-sm skill_name' placeholder='Skill name' value='' required maxlength='20'></div></div><div class='col-xs-4 col-sm-4 col-md-4'><div class='form-group'><input type='number' name='skill"+numItems+"Perc' id='skill"+numItems+"percent' class='form-control input-sm skill_score' placeholder='%' value='80' min='1' max='100'></div></div><div class='col-xs-12 col-sm-12 col-md-12'><div class='form-group'><div id='skill"+numItems+"BG' data-format='alias' class='input-group colorpicker-component'><input id='skill"+numItems+"Color' name='skill"+numItems+"Color' type='text' value='#67b0d1' class='form-control skill_color' required pattern='#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})'/><span class='input-group-addon'><i></i></span></div></div></div><hr></div>" );
        //Add colorpicker event
        $('#skill'+numItems+'BG').colorpicker($colorPallet);
        //Add skillBar
        --numItems;
        $( ".skillbar:eq("+numItems+")" ).show(1000);
      }
      else
      {
        alert(numItems);
      }
    });

    $('.removeSkill').click(function(e) {
      e.preventDefault(); 
      var numItems = $('.skillEdite').length;
      if (numItems > 1) {
        $( ".skillEdite:last" ).remove();
        numItems--;
        $( ".skillbar:eq("+numItems+")" ).hide(1000);
      }
      else
      {
        alert(numItems);
      }
    });

    //var numItems = $('.skillEdite').length

});