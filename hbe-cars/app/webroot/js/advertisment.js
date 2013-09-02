$(document).ready(function(){	


$('#example2').hoverAccordion({
                keepHeight:true,
                activateItem: 3,
				onClickOnly:true,
                speed: 400
            });
            $('#example2').children('li:first').addClass('firstitem');
            $('#example2').children('li:last').addClass('lastitem');
});