	$(document).ready(function(){
	function Display_Load()
	{
	    $("#loading").fadeIn(100);
		$("#loading").html("<img src='images/loading.gif' padding='0px'/>");
	}
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	$("#pagination li:first").css({'color' : '#FF0084','border' : 'none'});
	$("#content").load("data.php?page=1", Hide_Load());
	$("#pagination li").click(function(){
		Display_Load();
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});
		var pageNum = this.id;
		$("#content").load("data.php?page=" + pageNum, Hide_Load());
	});
});

