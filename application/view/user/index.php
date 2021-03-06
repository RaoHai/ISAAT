<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Demo 6.0.4
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->values["title"]; ?></title>
<!--
    The Bootstrap CSS is not required, but included for the demo.
    However, the FileUpload user interface waits for CSS transition events in several callbacks,
    if a "fade" class is present. These CSS transitions are defined by the Bootstrap CSS.
    If it is not included, either remove the "fade" class from the upload/download templates,
    or define your own "fade" class with CSS transitions.
-->
<link rel="stylesheet" href="/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap-image-gallery.min.css">
<link rel="stylesheet" href="/indexstyle.css">
<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/bootstrap-ie6.min.css"><![endif]-->
<link rel="stylesheet" href="/jquery.fileupload-ui.css">

</head>
<body>
<div id="index">
<div id="header">
		<div id="hd-link">
						<?php if($this->values["user"]) {  ?>
							欢迎回来，<a href="/home" ><?php echo $this->values["nickname"]; ?></a> <a href="/user/logout">[退出]</a>
						<?php } else { ?>
							<a href="/user/loginpage?/" >[登录]</a>
							<a href="register.html">[注册]</a>
						<?php } ?>
						

		</div>

		<a href="/"><div class="img"></div></a>
		<div class="nav">
			<ul id="logonav">
				<li id="nv-hm">
					<a href="/home"  style="border-bottom: 4px solid #09f;color:#09f;">我的Pic</a>
				</li>
				<li id="nv-cv">
					<a href="/cover">发现</a>
				</li>
				<li id="nv-group">
					<a href="/group">小组</a>
				</li>	
				<li id="nv-recom">
					<a href="/recommend">推荐</a>
				</li>
				<li id="nv-search">
				<a>
					<form action="index.php" class="clearfix" id="search_box" method="get">
					  <label> 
						<input id="search_field" name="search_field" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" size="40" type="text" value="图片/作者/画集" /> 
						  <button class="topsearch-sub" type="submit">找一找</button>
					  </label> 
					</form> 
				</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="content">
		<div id="welcome" >
			<a id="myphoto"><?php echo $this->values["nickname"]; ?></a>
			<a id="showup"style="text-align:center;">上传</a>
			<a id="showcatch">抓取网址</a>
			<a id="showgroup" href="/imagegroup/all">查看画集</a>
		</div>
<p></p>
</br>

<div class="container" id="fcontainer">
    <form id="fileupload" action="/user/loader/" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="span16 fileupload-buttonbar">
                <span class="btn success fileinput-button">
                    <span>添加文件...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn primary start">开始上传</button>
                <button type="reset" class="btn info cancel">取消上传</button>
                <button type="button" class="btn danger delete">删除选择的文件</button>
                <input type="checkbox" class="toggle">全选
				 <button type="button" class="btn danger complete" id="uploadcomplete" style="float:right">完成</button>
				   <p>
				   <div style="float:left;margin-top:10px;">请选择要上传到的画集：</div>
				   	<select id="upselect" name="upselect" style="float:left;margin-top:5px;">
						<?php echo $this->values["groupselect"]; ?>
					</select>
					 				 
					<button data-controls-modal="modal-from-dom" data-backdrop="true" data-keyboard="true" class="btn"style="margin-top: 4px;margin-left:20px;">新建画集</button>
					<button data-controls-modal="modal-from-edit" data-backdrop="true" data-keyboard="true" class="btn" id="groupsettings" style="margin-top: 4px;margin-left:20px;">画集设定</button>
				
				   <div class="progressbar fileupload-progressbar fade"><div style="width:0%;"></div></div></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="span16">
                <div class="zebra-striped"><div class="files" ></div></div>
            </div>
        </div>
    </form>
</div>
</div>
<!-- gallery-loader is the loading animation container -->
<div id="gallery-loader"></div>
<!-- gallery-modal is the modal dialog used for the image gallery -->
<div id="gallery-modal" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">&times;</a>
        <h3 class="title"></h3>
		<input class = "imgname" id="edimgname" name="edimgname" style="display:none"/>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
		<input id="edimgdesc" name="edimgdesc" class="imgdesc" style="float:left" value="点击这里为图片添加描述"/>
		<a class="btn save" id="imgedit" style="float:left">保存</a>
        <a class="btn primary next">下一张</a>
        <a class="btn info prev">上一张</a>
        <a class="btn success download" target="_blank">下载</a>
    </div>
</div>
          <div id="modal-from-dom" class="modal hide fade">
            <div class="modal-header" style="background-color:#339BB9;">
              <a href="#" class="close">&times;</a>
              <h3 style="color:white;">新建画集</h3>
            </div>
			<div id="groupnotice" style="text-align:center;display:none;">    <h4 style="color:red;">添加成功</h4></div>
            <div class="modal-body">
				 <form id="imggroupnew" name="imggroupnew" action="/imagegroup/new" method="POST" enctype="multipart/form-data">
				<p>新建画集……</p>
				<p>画集名称：<input name="groupname" id="groupname"/></p></br>
				<p>画集描述：<textarea name="groupdescription" id="groupdescription" ></textarea></p></br>
				<p>画集类型：<select name="groupcatalog" id="groupcatalog"><option value="1">所有人可见</option><option value="2">仅自己可见</option><option value="3">仅小组可见</option><option value="4">仅好友可见</option></select></p>
			  </form>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn primary" id="groupsubmit" >添加</a>
              
            </div>
          </div>          
		  <div id="modal-from-edit" class="modal hide fade">
            <div class="modal-header">
              <a href="#" class="close">&times;</a>
              <h3>修改画集信息</h3>
            </div>
			<div id="edgroupnotice" style="text-align:center;display:none;">    <h4 style="color:red;">设置成功</h4></div>
            <div class="modal-body">
				 <form id="imggroupnew" name="imggroupnew" action="/imagegroup/new" method="POST" enctype="multipart/form-data">
				<p>修改画集信息……</p>
				<input id="edgroupid" style="display:none;"/>
				<p>画集名称：<input name="groupname" id="edgroupname"/></p></br>
				<p>画集描述：<textarea name="groupdescription" id="edgroupdescription" ></textarea></p></br>
				<p>画集类型：<select name="groupcatalog" id="edgroupcatalog"><option value="1">所有人可见</option><option value="2">仅自己可见</option><option value="3">仅小组可见</option><option value="4">仅好友可见</option></select></p>
			  </form>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn primary" id="edgroupsubmit" >保存</a>
              
            </div>
          </div>
</div>
<script>
var fileUploadErrors = {
    maxFileSize: '文件太大',
    minFileSize: '文件太小',
    acceptFileTypes: '无效的文件类型',
    maxNumberOfFiles: '文件数量过多',
    uploadedBytes: '上传的字节超过文件的大小',
    emptyResult: '空文件'
};
</script>
<script id="template-upload" type="text/html">
{% for (var i=0, files=o.files, l=files.length, file=files[0]; i<l; file=files[++i]) { %}
    <div class="template-upload fade" style="width:130px;height:130px;float:left;">
        <div class="preview"  style="width:100px;height:80px;"><span class="fade"></span></div>
        <div class="name">{%=file.name%}</div>
        <div class="size">{%=o.formatFileSize(file.size)%}</div>
     
        {% if (file.error) { %}
            <div class="error" colspan="2"><span class="label important">Error</span> {%=fileUploadErrors[file.error] || file.error%}</div>
        {% } else if (o.files.valid && !i) { %}
            <div class="progress" ><div class="progressbar"><div style="width:0%;"></div></div></div>
            <div class="start">{% if (!o.options.autoUpload) { %}<button class="btn primary">开始上传</button>{% } %}</div>
        {% } else { %}
            <div colspan="2"></div>
        {% } %}
        <div class="cancel">{% if (!i) { %}<button class="filecan" name="取消上传"></button>{% } %}</div>
    </div>
{% } %}
</script>
<script id="template-download" type="text/html" >
{% for (var i=0, files=o.files, l=files.length, file=files[0]; i<l; file=files[++i]) { %}
    <div class="template-download fade" style="width:130px;height:130px;float:left;">
        {% if (file.error) { %}
            <div></div>
            <div class="name">{%=file.name%}</div>
            <div class="size">{%=o.formatFileSize(file.size)%}</div>
            <div class="error" colspan="2"><span class="label important">Error</span> {%=fileUploadErrors[file.error] || file.error%}</div>
        {% } else { %}
			
            <div class="preview" style="width:100px;height:100px;">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}"  name="{%=file.desc%}" rel="gallery"><img src="{%=file.thumbnail_url%}"></a>
				
            {% } %}</div>
			
            <div class="name" style="overflow:hidden;width:100px;">
                <a href="{%=file.url%}" title="编辑 {%=file.shortname%}" rel="normal">{%=file.shortname%}</a>
            </div>
            <div class="size">{%=o.formatFileSize(file.size)%}</div>
         
            <div colspan="2"></div>
        {% } %}
		          
        <div class="delete" id="deletebt">
            <button class="filedel" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"  title="删除"></button>
			
			<input type="checkbox" name="delete" value="1" id="deleteck">
        </div>
		
    </div>
{% } %}
</script>
<script src="/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/vendor/jquery.ui.widget.js"></script>
<!-- The Templates and Load Image plugins are included for the FileUpload user interface -->
<script src="/tmpl.min.js"></script>
<script src="/load-image.min.js"></script>
<!-- Bootstrap Modal and Image Gallery are not required, but included for the demo -->
<script src="/bootstrap-modal.min.js"></script>
<script src="/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/jquery.iframe-transport.js"></script>
<script src="/jquery.fileupload.js"></script>
<script src="/jquery.fileupload-ui.js"></script>
<script src="/application.js"></script>

<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="cors/jquery.xdr-transport.js"></script><![endif]-->
</body> 
</html>