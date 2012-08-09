/*=============================================================================
#     FileName: application.js
#         Desc:  
#       Author: surgesoft
#        Email: surgesoft@gmail.com
#     HomePage: surgesoft.github.com
#      Version: 0.0.1
#   LastChange: 2012-08-09 11:21:56
#      History:
=============================================================================*/
$loadconsole = function()
{

	$("<div></div>").addClass("console").html("<div class='title'>Console</div>"
			+"<div class='selection' id='Content'>Content</div>"
			+"<div class='selection' id='Columns'>Columns</div>")
		.prependTo($(".doc"));

	$("<div></div>").addClass("bg").prependTo($(".doc"));
};
$initeditor = function(id,title,subtitle,context)
{
		$('.modal-edit').show();
		$(".editor").html("");
		$("<div class='editor'></div>").html("<div><b>Title:</b></div><input name='title' id='title' value='"+title+"'/></br>"+
		"<div><b>Subtitle:</b></div><input name='subtitle' id='subtitle' value='"+subtitle+"'/>"
		+"<input style='display:none;' name='id' id='ctname' value='"+id+"'/>")		
		.appendTo($("#myModal .modal-inner"));
		editor.html(context);
		$("#modal-submit").show();
		$("#myModal").css({width:800,left:"40%"});
};
$bindedit = function()
{
	$("#modal-table td[class=edit]").unbind("click");
	$(".delcolumn").unbind("click");
	$("#modal-table td[class=edit]").click(function()
	{
	$this = $(this)
	var col = $(this).prevAll().length;
	var headerObj = $(this).parents('table').find('th').eq(col);
	var line = $(this).parents('tr').attr("data-id");
	$("#floatinput").attr("dataid",line).attr("col",headerObj.text()).val($(this).text())
		.css({"display":"block","left":$(this).offset().left,"top":$(this).offset().top,"width":$(this).width()+10,"height":$(this).height()+10});
	$("#floatinput").unbind("keyup");
	$("#floatinput").bind("keyup",function(event)
		{
			if (event.keyCode=="13"){
				$.ajax({                                                
					type: "POST",                                 
					url: "/columns/save/",  
					data: "id="+$(this).attr("dataid")+"&columnname="+$(this).attr("col")+"&value="+$(this).val(),  
					dataType: "json",
					success: function(msg){
						$("#floatinput").css({"display":"none"});
						$this.html($("#floatinput").val());
					}
				});				
				$(this).blur();
			}
		});
			});//End #modal-table td click
	$(".delcolumn").click(function()
	{
		if(confirm('Do you really want to delete this line?'))
		{
			$.getJSON("/columns/del/"+$(this).attr("data-id"),function()
			{
				window.location.reload();
			});
		}
		return false;
	});//End delcolumn click
};
$(document).ready(function(){

	$.getJSON("/index/getpermission",function(value)
		{
			if(value==true) $loadconsole();
			//$loadconsole();
			$("#Content").click(function()
				{
					$('#myModal').modal('show');
					$('#modal-title').html("Contents Manager");
					$("#myModal .modal-inner").html("Select Columns:");
					$.getJSON("/columns/get",function(values)
					{
						$("<select id='columnselect'></select>").appendTo($("#myModal .modal-inner"));
						$.each(values,function(i,value)
						{
							$("<option value ='"+value.ColumnsId+"'>"+value.columnsName+"</option>").appendTo($("#columnselect"));
						});
						
						$("#columnselect").change(function() {
							$.getJSON("/columns/"+$(this).val()+"?json=true",function(values)
							{
								values= values[0];
								if(typeof(values) == 'undefined')
									$initeditor("","","","");
								else
									$initeditor(values.ContentsId,values.contentsName,values.Summary,values.contentsText);
							});
						});
						$("#columnselect").change();
					});	
					
				});
				
			$("#Columns").click(function()
				{
					$('.modal-edit').hide();
					$("#modal-submit").hide();
					$("#myModal").css({width:400,left:"50%"});
					$('#myModal').modal('show');
					$('#modal-title').html("Columns Manager");
					$.getJSON("/columns/get",function(values)
						{
							$("#myModal .modal-inner").html("Exsist Columns:");
							$('<table class="table table-bordered table-striped" id="modal-table"></table>').html("<thead><tr><th>Name</th><th>Description</th><th>Display</th><th>Action</th></tr></thead>").appendTo($("#myModal .modal-inner"));
							$.each(values,function(i,value)
								{

									$("#modal-table").append("<tr data-id='"+value.ColumnsId+"'><td class='edit'>"+value.columnsName+"</td><td class='edit'>"+value.columnsDesc+"</td><td class='edit'>"+value.isshow+"</td><td><a href='#' class='delcolumn' data-id='"+value.ColumnsId+"'>DEL</a></td></tr>");
								});

							$("<a id='addcolumns' href='#'>add column</a>").appendTo($("#myModal .modal-inner"));
							$bindedit();
							$("#addcolumns").click(function()
								{
									$.getJSON("/columns/new/",function(value)
										{
											$("#modal-table").append("<tr data-id='"+value+"'><td class='edit'>New Column</td><td class='edit'>Discription</td><td class='edit'>1</td><td><a href='#' class='delcolumn' data-id='"+value+"'>DEL</a></td></tr>");
											$bindedit();
										});
								});//End addcolumns click
						});//End $json
				}) //End Click;
		});//End $json 
	$("#modal-submit").click(function()
	{
		var tid = $("#ctname").val();
		var title = $("#title").val();
		var subtitle = $("#subtitle").val();
		var parentid = $("#columnselect").val();
		
		var content = encodeURIComponent(editor.html());
			$.ajax({                                                
					type: "POST",                                 
					url: "/contents/save/",  
					data: "id="+tid+"&title="+title+"&subtitle="+subtitle+"&content="+content+"&parentid="+parentid,  
					dataType: "json",
					success: function(msg){
						$('#myModal').modal('hide');
					}
				});	

	});
});


