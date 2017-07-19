  $(document).ready(function() {

    $('#portfolioBackgroundColor').colorpicker($colorPallet);
    $('#portfolioColor').colorpicker($colorPallet);

    var portfolioBackground = $('#portfolio_background_color').val();
    $('.portfolio_default_tmp').css('background-color', portfolioBackground);   //default
    $('.portfolio_oscar_tmp').css('background-color', portfolioBackground);     //oscar
    $('.portfolio_roxy_tmp').css('background-color', portfolioBackground);      //roxy
    $('.portfolio_flower_tmp').css('background-color', portfolioBackground);      //flower
    $('.portfolio_romeo_tmp').css('background-color', portfolioBackground);      //romeo
    $('.portfolio_milo_tmp').css('background-color', portfolioBackground);      //milo

    var portfolioColor = $('#portfolio_color').val();
    $('.preview-section-title').css('color', portfolioColor);
    $('.preview-section-title-oscar').css('color', portfolioColor);
    $('.preview-section-title-roxy').css('color', portfolioColor);
    $('.preview-section-title-flower').css('color', portfolioColor);
    $('.preview-section-title-romeo').css('color', portfolioColor);
    $('.preview-section-title-milo').css('color', portfolioColor);

    var beginProjecten = $('.tab-pane').length;
    var a = 1;
    for (var i = 0; i < beginProjecten; i++) 
    {
      $( ".portfolio-item:eq("+i+")" ).show();          //default
      $( ".preview-item-oscar"+i).show();               //oscar
      $( ".preview-item-roxy"+i).show();               //roxy
      $( ".preview-item-flower"+i).show();               //flower
      $( ".preview-item-romeo"+i).show();               //romeo
      $( ".preview-item-milo"+i).show();               //milo

      var title     = $( "#title"+i).val();
      console.log(i +'-'+ title);
      var caption   = $( "#caption"+i).val();
      var extra     = $( "#extra"+i).val();
      var image     = $( "#image"+i).attr("data-image"+i);
      var link      = $( "#link"+i).val();

      $('.preview-title:eq('+i+')').html(title);              //default
      $('.preview-caption:eq('+i+')').html(caption);          //default
      $('.preview-extra:eq('+i+')').html(extra);              //default
      $('.preview-image:eq('+i+')').attr("src",image);        //default
      $('.preview-link:eq('+i+')').attr("href",link);         //default

      $('.preview-title-oscar'+i).html(title);        //oscar
      $('.preview-caption-oscar'+i).html(caption);    //oscar
      $('.preview-extra-oscar'+i).html(extra);        //oscar
      $('.preview-image-oscar'+i).attr("src",image);  //oscar
      $('.preview-link-oscar'+i).attr("href",link);   //oscar

      $('.preview-title-roxy'+i).html(title);        //roxy
      $('.preview-caption-roxy'+i).html(caption);    //roxy
      $('.preview-extra-roxy'+i).html(extra);        //roxy
      $('.preview-image-roxy'+i).attr("src",image);  //roxy
      $('.preview-link-roxy'+i).attr("href",link);   //roxy

      $('.preview-title-flower'+i).html(title);        //flower
      $('.preview-caption-flower'+i).html(caption);    //flower
      $('.preview-extra-flower'+i).html(extra);        //flower
      $('.preview-image-flower'+i).attr("src",image);  //flower
      $('.preview-link-flower'+i).attr("href",link);   //flower

      $('.preview-title-romeo'+i).html(title);        //romeo
      $('.preview-caption-romeo'+i).html(caption);    //romeo
      $('.preview-extra-romeo'+i).html(extra);        //romeo
      $('.preview-image-romeo'+i).attr("src",image);  //romeo
      $('.preview-link-romeo'+i).attr("href",link);   //romeo

      $('.preview-title-milo'+i).html(title);        //milo
      $('.preview-caption-milo'+i).html(caption);    //milo
      $('.preview-extra-milo'+i).html(extra);        //milo
      $('.preview-image-milo'+i).attr("src",image);  //milo
      $('.preview-link-milo'+i).attr("href",link);   //milo

      a++;
    }




    $('.owl-height').css('height', '100%');

    $('.form-area').on('keyup','.portfolioTitle', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".portfolioTitle" ).index(this);
      $('.preview-title:eq('+numItems+')').html(value);             //default
      $('.preview-title-oscar'+numItems).html(value);       //oscar
      $('.preview-title-roxy'+numItems).html(value);       //roxy
      $('.preview-title-flower'+numItems).html(value);       //flower
      $('.preview-title-romeo'+numItems).html(value);       //romeo
      $('.preview-title-milo'+numItems).html(value);       //milo
    });

    $('.form-area').on('keyup','.portfolioCaption', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".portfolioCaption" ).index(this);
      $('.preview-caption:eq('+numItems+')').html(value);           //default
      $('.preview-caption-oscar'+numItems).html(value);     //oscar
      $('.preview-caption-roxy'+numItems).html(value);      //roxy
      $('.preview-caption-flower'+numItems).html(value);     //flower
      $('.preview-caption-romeo'+numItems).html(value);     //romeo
      $('.preview-caption-milo'+numItems).html(value);     //milo

    });

    $('.form-area').on('keyup','.portfolioExtra', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".portfolioExtra" ).index(this);
      $('.preview-extra:eq('+numItems+')').html(value);             //default
      $('.preview-extra-oscar'+numItems).html(value);       //oscar
      $('.preview-extra-roxy'+numItems).html(value);       //roxy
      $('.preview-extra-flower'+numItems).html(value);       //flower
      $('.preview-extra-romeo'+numItems).html(value);       //romeo
      $('.preview-extra-milo'+numItems).html(value);       //milo
    });
    $('.form-area').on('keyup','.portfolioLink', function(e) {
      var value     = $(this).val();
      var numItems  = $( ".portfolioLink" ).index(this);
      $('.preview-link:eq('+numItems+')').attr("href",value);       //default
      $('.preview-link-oscar'+numItems).attr("href",value); //oscar
      $('.preview-link-roxy'+numItems).attr("href",value); //roxy
      $('.preview-link-flower'+numItems).attr("href",value); //flower
      $('.preview-link-romeo'+numItems).attr("href",value); //romeo
      $('.preview-link-milo'+numItems).attr("href",value); //milo
    });

    $('#portfolio_background_color').on('change', function() {
      var value = $('#portfolio_background_color').val();
      $('.portfolio_default_tmp').css('background', value);         //default
      $('.portfolio_oscar_tmp').css('background', value);           //oscar
      $('.portfolio_roxy_tmp').css('background', value);           //roxy
      $('.portfolio_flower_tmp').css('background', value);           //flower
      $('.portfolio_romeo_tmp').css('background', value);           //romeo
      $('.portfolio_milo_tmp').css('background', value);           //milo
    });

    $('#portfolio_color').on('change', function() {
      var value = $('#portfolio_color').val();
      $('.section-heading').css('color', value);                    //default
      $('.preview-section-title-oscar').css('color', value);
      $('.preview-section-title-roxy').css('color', value);
      $('.preview-section-title-flower').css('color', value);
      $('.preview-section-title-romeo').css('color', value);
      $('.preview-section-title-milo').css('color', value);
    });
    
    $('.addSkill').click(function(e) {
      e.preventDefault(); 
      var numItems = $('.tab-pane').length;
      var projectaantal = numItems + 1;
      if (numItems < 6) {
          $(".tab-pane").removeClass("active");
          $(".tabButton").removeClass("active");
        //Add skill bar menu
        $( ".tab-pane:last" ).after( "<div class='tab-pane active' id='tab_default_"+projectaantal+"'><div class='col-sm-4'><div class='form-group'><input type='text' class='form-control portfolioTitle' id='title"+numItems+"' name='title"+numItems+"' placeholder='Title' value='Title for project"+projectaantal+"' required maxlength='20'></div><div class='form-group'><input type='text' class='form-control portfolioCaption' id='caption"+numItems+"' name='caption"+numItems+"' placeholder='Caption' value='Caption for project"+projectaantal+"' required maxlength='20'></div><div class='form-group'><i class='fa fa-trash-o fa-2x trahscan' aria-hidden='true'></i><input type='file' id='image"+numItems+"' class='portfolioImage' name='image"+numItems+"' data-image"+numItems+"='./assets/img/placeholder.png' accept='.png,.jpg,.jpeg'></div></div><div class='col-sm-8'><textarea class='form-control portfolioExtra' id='extra"+numItems+"' name='extra"+numItems+"' placeholder='Extra' maxlength='100' rows='3'>Description for project"+projectaantal+"</textarea><span class='help-block'><p id='characters' class='help-block '></p></span><input type='url' class='form-control portfolioLink' id='link"+numItems+"' name='link"+numItems+"' placeholder='Link' value=''></div></div>");

          var title     = $( "#title"+numItems).val();
          var caption   = $( "#caption"+numItems).val();
          var extra     = $( "#extra"+numItems).val();
          var image     = $( "#image"+numItems).attr("data-image"+numItems);
          var link      = $( "#link"+numItems).val();

          $('.preview-title:eq('+numItems+')').html(title);         //default
          $('.preview-caption:eq('+numItems+')').html(caption);     //default
          $('.preview-extra:eq('+numItems+')').html(extra);         //default
          $('.preview-image:eq('+numItems+')').attr("src",image);   //default
          $('.preview-link:eq('+numItems+')').attr("href",link);    //default
          $('.preview-title-oscar'+numItems).html(title);         //oscar
          $('.preview-caption-oscar'+numItems).html(caption);     //oscar
          $('.preview-extra-oscar'+numItems).html(extra);         //oscar
          $('.preview-image-oscar'+numItems).attr("src",image);   //oscar
          $('.preview-link-oscar'+numItems).attr("href",link);    //oscar
          $('.preview-title-roxy'+numItems).html(title);         //roxy
          $('.preview-caption-roxy'+numItems).html(caption);     //roxy
          $('.preview-extra-roxy'+numItems).html(extra);         //roxy
          $('.preview-image-roxy'+numItems).attr("src",image);   //roxy
          $('.preview-link-roxy'+numItems).attr("href",link);    //roxy
          $('.preview-title-flower'+numItems).html(title);         //flower
          $('.preview-caption-flower'+numItems).html(caption);     //flower
          $('.preview-extra-flower'+numItems).html(extra);         //flower
          $('.preview-image-flower'+numItems).attr("src",image);   //flower
          $('.preview-link-flower'+numItems).attr("href",link);    //flower
          $('.preview-title-romeo'+numItems).html(title);         //romeo
          $('.preview-caption-romeo'+numItems).html(caption);     //romeo
          $('.preview-extra-romeo'+numItems).html(extra);         //romeo
          $('.preview-image-romeo'+numItems).attr("src",image);   //romeo
          $('.preview-link-romeo'+numItems).attr("href",link);    //romeo
          $('.preview-title-milo'+numItems).html(title);         //milo
          $('.preview-caption-milo'+numItems).html(caption);     //milo
          $('.preview-extra-milo'+numItems).html(extra);         //milo
          $('.preview-image-milo'+numItems).attr("src",image);   //milo
          $('.preview-link-milo'+numItems).attr("href",link);    //milo

        $( ".tabButton:last" ).after( "<li class='tabButton active'><a href='#tab_default_"+projectaantal+"' data-toggle='tab'>Tab "+projectaantal+" </a></li>");
        
        $( ".portfolio-item:eq("+numItems+")" ).show();         //deafault
        $( ".preview-item-oscar"+numItems ).show();    //oscar
        $( ".preview-item-roxy"+numItems ).show();    //roxy
        $( ".preview-item-flower"+numItems ).show();    //flower
        $( ".preview-item-romeo"+numItems ).show();    //romeo
        $( ".preview-item-milo"+numItems ).show();    //milo

        ChangeheigtOwl();

      }
      else
      {
        alert(numItems);
      }
    });

    $('.removeSkill').click(function(e) {
      e.preventDefault();
      $(".tab-pane").removeClass("active");
      $(".tabButton").removeClass("active");
      var numItems = $('.tab-pane').length;
      if (numItems > 1) {
        $( ".tab-pane:last" ).remove();
        $( ".tabButton:last" ).remove();
        numItems--;
        $( ".portfolio-item:eq("+numItems+")" ).hide();        //deafault
        $( ".preview-item-oscar"+numItems ).hide();    //oscar
        $( ".preview-item-roxy"+numItems ).hide();    //roxy
        $( ".preview-item-flower"+numItems ).hide();    //flower
        $( ".preview-item-romeo"+numItems ).hide();    //romeo
        $( ".preview-item-milo"+numItems ).hide();    //milo

        ChangeheigtOwl();
        
        $.ajax({
              type: "POST",
              url: "./processes/ajax-random.php",
              data: { toDo: 'deletePortfolioImage', numItems: numItems },
              cache: false,
              success: function(data){
              }
        }); 
      }
      else
      {
        alert(numItems);
      }
      $( ".tab-pane:last" ).addClass("active");
      $( ".tabButton:last" ).addClass("active");
    });

    $('.form-area').on('click', '.trahscan' ,function(e) {
        e.preventDefault();
        var numItems = $('.trahscan').index(this);
        $.ajax({
              type: "POST",
              url: "./processes/ajax-random.php",
              data: { toDo: 'deletePortfolioImage', numItems: numItems },
              cache: false,
              success: function(data){
              }
        });
        $('.preview-image:eq('+numItems+')').attr("src","./assets/img/placeholder.png");        //deafault
        $('.preview-image-oscar'+numItems).attr("src","./assets/img/placeholder.png");  //oscar
        $('.preview-image-roxy'+numItems).attr("src","./assets/img/placeholder.png");  //roxy
        $('.preview-image-flower'+numItems).attr("src","./assets/img/placeholder.png");  //flower
        $('.preview-image-romeo'+numItems).attr("src","./assets/img/placeholder.png");  //romeo
        $( ".preview-item-milo"+numItems ).hide();    //milo

        $( "#image"+numItems).val('');
        ChangeheigtOwl();
      });

    $(".form-area").on('change', '.portfolioImage',function(e) {
        var counter = $(".portfolioImage").index(this);
        readURL(this, counter);
    });

    function readURL(input, counter) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.preview-image:eq('+counter+')').attr('src', e.target.result);         //deafult
                $('.preview-image-oscar'+counter).attr('src', e.target.result);   //oscar
                $('.preview-image-roxy'+counter).attr('src', e.target.result);   //roxy
                $('.preview-image-flower'+counter).attr('src', e.target.result);   //flower
                $('.preview-image-romeo'+counter).attr('src', e.target.result);   //romeo
                $('.preview-image-milo'+counter).attr('src', e.target.result);   //milo

                setTimeout(function(){
                  ChangeheigtOwl();
                }, 500);
                ChangeheigtOwl();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function ChangeheigtOwl() {
        var heightActive = $( ".active .item" ).height();
        heightActive = heightActive + 23;
        $( ".owl-height" ).css('height', heightActive);
    }

});