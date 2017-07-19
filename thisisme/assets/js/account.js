  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

  $(document).ready(function() {

      $('.cvpres').on('click', '.trahscan' ,function(e) {
        e.preventDefault();
        $.ajax({
              type: "POST",
              url: "./processes/ajax-random.php",
              data: { toDo: 'removeCv'},
              cache: false,
              success: function(data){
                if(data){
                  $('.cvpres').empty();
                }
              }
        });
      });

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  $(".cancel-button").click(function(event){
      event.preventDefault();
      window.location.href = "./mypage.php";
  });
      
  });