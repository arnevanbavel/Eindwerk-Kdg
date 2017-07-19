(function ($) {

	$(window).scroll(function() {
		if ($(".navbar").offset().top > 50) {
			$(".navbar-fixed-top").addClass("top-nav-collapse");
		} else {
			$(".navbar-fixed-top").removeClass("top-nav-collapse");
		}
	});

	$('.navbar-custom #searchButton').click(function() {
            $('.navbar-custom .searchField').toggle(700);
            $('.navbar-custom #resultarea').toggle(700);
    });

        $colorPallet = {colorSelectors: {'#000000': '#000000','#0e2a36': '#0e2a36','#3f4c55': '#3f4c55','red': '#FF0000','#9b59b6': '#9b59b6','#3498db': '#3498db','#00bd86': '#00bd86','#e74c3c': '#e74c3c','#e67e22': '#e67e22','#f1c40f': '#f1c40f','#ffffff': '#ffffff'}};

})(jQuery);

 $(document).ready(function() {
    $('#searchButton').click(function() {
     $('#ZoekVeld').focus();
    });

   $('form').on('keypress','input', function (event) {
   	var html = $(this).val();
   	html = html.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    $(this).val(html);
});

$('#header-section a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 1200);
    return false;
});

}); 