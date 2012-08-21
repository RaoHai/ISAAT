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
       <div class="header-nav">
      <div id="header-right">
          <div id="header-left-tri"></div>
          <div id="header-content">
              <ul>
                  <li>
              <form id="search">
                  <input name="search" id="search-input" onblur="if(this.value=='') this.value='Enter Search Term';" onfocus="if(this.value=='Enter Search Term')this.value='';" value="Enter Search Term"/>
              </form>
              </li>
              <li>
              <a href="/"> Home </a></li><li> Sitemap</li>
      <?php if($this->values["USER"]) {  ?>
     <?php } else { ?><li><a href="/register/login">Login</a></li>
      <?php } ?><li> Contact</li></ul> </div>
  
  <div id="header-right-tri"></div>
  </div>
  <a class="logo" href="/"></a>
  <span class="index-senten"></span>
  <div class="navi">
      <div class="outer">
          <div class="menu">

              <ul>
                  <li><a href="/">Home</a></li>

                  <?php foreach($this->values["cols"] as $col) {  ?>
                  <li><a href="/columns/<?php echo $col->ColumnsId; ?>"><?php echo $col->columnsName; ?></a></li>
                  <?php } ?>

              </ul>
          </div>
      </div>
  </div>
  </div>
  <div class="main">
      <div class="content">
<div style="margin-left: 20px; margin-right: 20px; text-align: left;">
    <h2>The 17th Chinese Conference of Abrasive Technology </h2>
</div>
<div id="photo"></div>
          <?php foreach($this->values["contents"] as $cot) {  ?>
              <div class="title">
                  <h2>
                      <?php echo $cot->contentsName; ?>
                      <h2>
                      </div>
                      <div class="subtitle">
                          <h3><?php echo $cot->Summary; ?></h3>
                      </div>
                      <div class="text"> 
					   <?php echo $cot->contentsText; ?>
					  </div>
                          </div>
						   <?php } ?> 
                          </div>
                          <div class="footer">
                              <div style="font-family: 'Khmer UI'; float: none; text-align: right; margin-right: 20px;" >
                                  © 2012 surgesoft
                              </div>
                          </div>
                      </div>
                      <!-- Modal Dialog -->
                      <div class="modal hide" id="myModal">
                          <input id='floatinput' style='display:none;position:fixed;z-index:1100;'/>
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              <h3 id="modal-title"></h3>
                          </div>
                          <div class="modal-body">
                              <div class="modal-inner"></div>
                              <div class='modal-edit'>
                                  <b>Content</b>

                                  <textarea id="cmeditor" name="text" cols="80" rows="20" style="width:750px;height:300px;"></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <a href="#" id="modal-submit" class="btn btn-primary" >Submit</a>
                              <a href="#" class="btn" data-dismiss="modal">Close</a>

                          </div>
                      </div>
                      <!-- end Modal Dialog -->
                      <script src="/js/jquery-1.7.1.min.js"></script><!--Script -->
                      <script src="/js/application.js"></script><!--Script -->
                      <script src="/js/bootstrap-modal.js"></script><!--Script -->
                      <script charset="utf-8" src="/editor/kindeditor-min.js"></script>
                      <script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
                      <script src="/js/waypoints.min.js"></script>
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
