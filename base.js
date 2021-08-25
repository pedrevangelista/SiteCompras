
$(".addNewTask").click(function(){
    $(".addEventContainer").css("display","block");
    $(".addPanel").css("display","block");
    $(".addPanel").css('z-index','9999');
	$(".blur").css('filter', 'blur(2.5px)');
	$(".addPanel").css('filter', 'blur(0px) !important');
		
	
});
$(".closebox").click(function(){
    $(".addEventContainer").css("display","none");
	$(".blur").css('filter', 'blur(0px)');
	
});
//funcao para aparecer a area de login de forma diferente e usando o blur de fundo
  
