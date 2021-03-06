<?php
require_once(APPLICATION_PATH."/view/ui.class.php");
$ui = ui::getInstance() ;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTER-ISAAT 2013</title>
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
          
              <div class="title">
                  <h2>
                      REGISTER
                      <h2>
                      </div>
                      <div class="subtitle">
                          <h3>Please complete your information:</h3>
                      </div>
                      <div class="text"> 
				<div>
 <label for="edit-name">Username:</label>
 <input type="text" maxlength="60" name="name" id="edit-name" size="60" value="" class="input-xlarge"/>
 <div id="namecheck"></div>
</div>

<div>
 <label for="edit-mail">E-mail address: </label>
 <input type="text" maxlength="64" name="mail" id="edit-mail" size="60" value="" class="input-xlarge"/>
</div>

<div>
 <label for="edit-pass-pass1">Password: </label>
 <input type="password" name="pass[pass1]" id="edit-pass-pass1"  maxlength="128"  size="25" class="input-xlarge"/>
</div>
 
<div>
 <label for="edit-pass-pass2">Confirm password: </label>
 <input type="password" name="pass[pass2]" id="edit-pass-pass2"  maxlength="128"  size="25"  class="input-xlarge"/>
</div>

<div>
 <label for="edit-profile-surname">Surname: </label>
 <input type="text" maxlength="255" name="profile_surname" id="edit-profile-surname" size="60" value="" class="input-xlarge"/>
</div>

<div>
 <label for="edit-profile-givenname">Given name:</label>
 <input type="text" maxlength="255" name="profile_givenname" id="edit-profile-givenname" size="60" value="" class="input-xlarge"/>
</div>

<div>
 <label for="edit-profile-phone">Phone: </label>
 <input type="text" maxlength="255" name="profile_phone" id="edit-profile-phone" size="60" value="" class="input-xlarge"/>
</div>

<div>
 <label for="edit-University-Company-">Company/University:</label>
 <input type="text" maxlength="255" name="University_Company_" id="edit-University-Company" size="60" value="" class="input-xlarge"/>
</div>

<div>
 <label for="edit-profile-department">Department: </label>
 <input type="text" maxlength="255" name="profile_department" id="edit-profile-department" size="60" value="" class="input-xlarge"/>
</div>

<div>
 <label for="edit-profile-country">Country: </label>
 <input type="text" maxlength="255" name="profile_country" id="edit-profile-country" size="60" value="" class="input-xlarge"/>
</div>

<div class="form-item" id="edit-comments-message-orga-wrapper">
 <label for="edit-comments-message-orga">Message for the Organisation Team: </label>
 <textarea cols="60" rows="5" name="comments_message_orga" id="edit-comments-message-orga"  class="input-xlarge"/></textarea>
</div>

<button id="register">Create new account</button>
					  </div>
                          </div>
						  
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
					 <script language="javascript" type="text/javascript">

$(document).ready(function(){

	$("input#edit-name").focus(function(){
		$("input#edit-name").blur(function(){			
			  $.ajax({
			  type: 'POST',
			  url: '/register/checkname',
			  data:"namechecks="+$("#edit-name").val(),
			  success: function(msg){ 
					$("#namecheck").empty();
					$("#namecheck").append("<b style='color:red;'>"+msg+"</b>");					
						}
			  });
			  });
			  });	
		
});

</script>

<script language="javascript" type="text/javascript">

$(document).ready(function(){	
	$('#register').click(function(){
		$.ajax({
			  type: 'POST',
			  url: '/register/register',
			  data:"namechecks="+$("#edit-name").val()+"&mail="+$("#edit-mail").val()+"&password="+$("#edit-pass-pass1").val()+"&surname="+$("#edit-profile-surname").val()+
					"&givename="+$("#edit-profile-givenname").val()+"&phone="+$("#edit-profile-phone").val()+"&company="+$("#edit-University-Company").val()+
					"&department="+$("#edit-profile-department").val()+"&country="+$("#edit-profile-country").val()+"&comments-message-orga="+$("#edit-comments-message-orga").val(),
			  success: function(msg){ 
					window.location.href="/";
						}
			  });
	});
		
});

</script>
 </body>
  </html>
