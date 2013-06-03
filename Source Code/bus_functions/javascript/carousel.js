function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 5,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

// συνάρτηση για την απόκρυψη των επιπλέων πληροφοριών στις κρέπες
$(function() 
{
	$('div.crepe').hide().fadeIn(700);
	$('<span class="exit">X</span>').appendTo('div.crepe');
	
	$('span.exit').click(function() 
	{
		$(this).parent('div.crepe').fadeOut('slow');						   
	});
	return false;
});
//-----------------------------------------------------------------------------------
