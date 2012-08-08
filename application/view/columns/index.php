<?php
require_once(APPLICATION_PATH."/view/ui.class.php");
$ui = ui::getInstance() ;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ISAAT 2013</title>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/main.css" rel="stylesheet" type="text/css">
</head>

<body class="doc">
<div class="main">
  <div syle="text-align:right;margin-right:20px;">
  <a href="/"> Home </a>| Sitemap | Login | Contact <img src="/images/arrow_gray.gif" width="6" height="12"></div>
  <div class="header"> </div>
  <div style="margin-left: 20px; margin-right: 20px; text-align: left;">
    <h2>16th International Symposium on Advances in Abrasive Technology </h2>
  </div>
  <div class="menu">
    <ul>
	 <a href="/"><li>Home</li></a>
	<?php foreach($this->values["cols"] as $col) {  ?>
		 <a href="/columns/<?php echo $col->ColumnsId; ?>"><li><?php echo $col->columnsName; ?></li></a>
	<?php } ?>
    
    </ul>
  </div>
  <div class="content">
  	  <?php foreach($this->values["contents"] as $cot) {  ?>
    <div class="left-nav">
      <div class="title">
        <h2>
		<?php echo $cot->contentsName; ?>
        <h2>
      </div>
      <div class="subtitle">
        <h3><?php echo $cot->Summary; ?></h3>
      </div>
    </div>
    <div class="right-nav">
      <div class="text">

		 <?php echo $cot->contentsText; ?>
	</div>
    </div>
		 <?php } ?> 
  </div>
</div>
<div class="footer">
    <div style="font-family: 'Khmer UI'; float: none; text-align: right; margin-right: 20px;" >
    © 2012 surgesoft
     </div>
</div>
<div class="modal hide" id="myModal">
<input id='floatinput' style='display:none;position:fixed;z-index:1100;'/>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <div class="modal-inner"></div>
	  <div class='modal-edit'>
  <b>Content</b>
 
<textarea id="cmeditor" name="text" cols="80" rows="20" style="width:750px;height:300px;"></textarea>
</div>
  </div>
  <div class="modal-footer">
  <a href="#" id="modal-submit" class="btn btn btn-primary" >Submit</a>
    <a href="#" class="btn" data-dismiss="modal">Close</a>

  </div>
</div>
<script src="/js/jquery-1.7.1.min.js"></script><!--Script -->
<script src="/js/application.js"></script><!--Script -->
<script src="/js/bootstrap-modal.js"></script><!--Script -->

 <script charset="utf-8" src="/editor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
		<script>
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('#cmeditor', {
							resizeType : 1,
							allowPreviewEmoticons : true,
							allowImageUpload : true,
							resizeMode : 1,
							items : [
								'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
								'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
								'insertunorderedlist', '|', 'emoticons', 'image', 'link']
						});
					});
		</script>
</body>
</html>
