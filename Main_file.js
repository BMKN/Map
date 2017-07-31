
$( document ).ready(function() {







	$('.dz-message').html('Drag file here'); //Upload box message 
	$('.dz-message').css('margin-top','0px');
	$('.dz-message').css('margin-top','0px');
	$(".my_image").attr("src", "Images/Upload.PNG");
	$(".my_image").css('margin-top','0px');
	$('.title').html('Mapping Tool'); 



//Below is used for changing the background when dragging file in 
$(window).on('dragenter', function(){
        $(this).preventDefault();
    });
    	$('.dropzone').bind('dragover', function(){
		$('.dz-message').html('');
        $(this).css('background-color','#00C851');
          $(this).css('opacity','0.5');
        $(this).css('border-style','dotted');
        $(this).css('border-width','5px');
        $('.my_image').fadeOut('slow');
    	$('.dz-default dz-message').hide();



    });
//Below is used for changing the background when dragging file Out

    	$('.dropzone').bind('dragleave', function(){
        $(this).css('background-color','#D3D3D3');
		$('.dz-message').html('Drag file here');
        $(this).css('border-style','solid');
        $(".my_image").attr("src", "Imagess/Upload.PNG");
	
         
     
    });










});




