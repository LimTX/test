$(document).ready(function() { 	 
	
	$('.content1').hide();
	$('.content2').hide();
	
	if($(window).width() <= 1024) {
		$('.content2').show();
		//SMALLER
		$('.fiftythree').width('35%');
		$('.fortynine').width('37%');
		$('.fortyfive').width('40%');
	} else if($(window).width() >= 1024) {
		$('.content1').show();
		//BIGGER
		$('.fiftythree').width('53%');
		$('.fortynine').width('49%');
		$('.fortyfive').width('45%');
	}
			
});

$(window).resize(function() {

		if($(window).width() <= 1024 && $(window).width() >= 1000) {
			
			$('.content1').hide();
			$('.content2').hide();
			$('.content2').show();
			// FOR BOOK B,C,D,E,F,G,H SMALLER
			$('.fiftythree').width('35%');
			// FOR BOOK A
			$('.fortynine').width('37%');
			// FOR BOOK AA
			$('.fortyfive').width('40%');
		
		} else if ($(window).width() <= 1000) {
			
			$('.content1').hide();
			$('.content2').hide();
			$('.content1').show();
			// FOR BOOK B,C,D,E,F,G,H BIGGER
			$('.fiftythree').width('53%');
			// FOR BOOK A
			$('.fortynine').width('49%');
			// FOR BOOK AA
			$('.fortyfive').width('45%');

		} else {
			
			$('.content1').hide();
			$('.content2').hide();
			$('.content1').show();
			// FOR BOOK B,C,D,E,F,G,H BIGGER
			$('.fiftythree').width('53%');
			// FOR BOOK A
			$('.fortynine').width('49%');
			// FOR BOOK AA
			$('.fortyfive').width('45%');
			
		}
		
});