$revise = function()
{
	var $WIDTH = $(".doc").width();
	if($WIDTH<780) $WIDTH=780;
	var $HEIGHT = $(".doc").height();
	var $left_nav_width = $WIDTH-180-50;
	var $each_width;
	var $each_height;
	var $Brick_each_line;

	if($left_nav_width>920) $Brick_each_line = 4;
	else $Brick_each_line = Math.ceil($left_nav_width/230);
	$(".left-nav").css(
	{
		width:$left_nav_width
	});
	if($left_nav_width>920)
		$each_width = $left_nav_width/$Brick_each_line -40;
	else 
		$each_width = $left_nav_width/$Brick_each_line -40;

	$each_height = $each_width/5.0*3;
	$i=0;
	$(".image").each(function()
	{
		$(this).css({width:$each_width,height:$each_height});
	});
	$(".Brick").each(function()
	{
		
		var $x = ($i%$Brick_each_line)*($each_width+30)+10+"px";
		var $y = Math.floor(($i)/$Brick_each_line)* ($each_height+40) +100+ "px";
		$(this).stop();
		$(this).animate({"left":$x,"top":$y});
		$i++;
	});
};



$loadblog = function()
{
	
	$(".content").html("<img src='images/loader.gif'></img>");
	$.getJSON("index/blog/", function (blogs) {
		$(".content").html("");
		$.each(blogs,function(i,blog)
		{
			$("<div></div>").addClass("post").html("<div><h2>"+blog.contentsName+"</h2></div>"+
			"<div><div class='thumbnail'><img src=\""+blog.titleImage+"\" style='width:150px;'/></div>"+
			"<div style='margin-left:20px;float:left;'><div>"+blog.time+"</div><div>"+blog.Summary+
			"</div></div>"+
			"</div>")
			.appendTo($(".content"));
			window.checkname ++;
		});

	});

};

$loadproduct = function()
{
	$(".content").html("<img src='images/loader.gif'></img>");
	$.getJSON("index/product/", function (products) {
		$(".content").html("");
		$.each(products,function(i,product)
		{
			$("<div></div>").addClass("Brick").html("<a href=\"http://"+product.href+"\"><div class=\"image\">"+
				"<img src=\""+product.titleImage+"\" style=\"width:100%;\">"+
				"</div></a>"+
				"<div id=\"title\">"+
				product.contentsName+
				"</div></div>")
				.appendTo($(".content"));
		});
		$revise();
	});
};
$(document).ready(function(){
	
	$revise();
 });
$(function(){

  $(window).hashchange( function(){
   	var $hash = window.location.hash.substr(1);
	if($hash=="product")
	{
		$(".about").removeClass("about_active");
		$(".blog").removeClass("blog_active");
		$(".product").addClass("product_active");
		$loadproduct();
	}else if($hash=="about")
	{
		$(".product").removeClass("product_active");
		$(".blog").removeClass("blog_active");
		$(".about").addClass("about_active");
		
	}else if($hash=="blog")
	{
		$(".product").removeClass("product_active");
		$(".about").removeClass("about_active");
		$(".blog").addClass("blog_active");
		$loadblog();
	}
  })
  $(window).hashchange();
});
 $(window).resize(function(){
	$revise();
 });
