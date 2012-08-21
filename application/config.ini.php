<?php
	/**
	 * 整体的配置文件
	 *
	 *  Copyright(c) 2011-2012 by surgesoft. All rights reserved
	 *
	 * To contact the author write to {@link mailto:surgesoft@gmail.com}
	 *
	 * @author surgesoft
	 * @version $Id: config.ini.php 2012-01-15 15:23


	 
	 */
	 //数据库配置：
	 //主机名
	 defined('DB_HOST')  || define('DB_HOST', "localhost");  
	//数据库用户名
	defined('DB_USER_NAME')  || define('DB_USER_NAME', "isaat");
	//数据库密码
	defined('DB_USER_PASSWORD')  	|| define('DB_USER_PASSWORD', "TTWzxxTrEPqaFaNu");
	//数据库名
	defined('DB_NAME')  || define('DB_NAME', "isaat");
            
       $_SESSION["USERID"]= 0; 
	static $_Struct=
	array(
		"columns" => array("columnsName","columnsDesc","isshow"),
		"childColumns"=>array("childColumnsName","parentColumns","desc"),
		"contents"=>array("contentsName","contentsText","parentId","Catalog","titleImage","swapimage","Summary","time"),
                "user"=>array("UserName","PassWord","Salt","Permission","surname","givenname","phone","company","department","country","message","email"),
                "paper"=>array("PaperName","authorId","summary","version","comments","posttime","changetime","filename","statu"),
                "paperfile"=>array("PaperfileName","submittime","comment","statu","paperId")
	);

	 
?>
