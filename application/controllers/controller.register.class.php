<?php

	require_once("controller.base.class.php");
	class register extends ControllerBase
	{
	
	
		public function  __construct()
		{
			parent::__construct();
		}
		
		public function _index()
		{
		$columns = new columns();
			$columns->Get("all");
                       $this->values = array("cols"=>$columns);	
			$this->RenderTemplate("register");
		}
		
		public function _checkname()
		{
			$user = new user();
                        $user->Get_By_UserName($_REQUEST['namechecks']);
                        //$user->Get(array("UserId"),array("UserName=".$_REQUEST['namechecks']));
			foreach($user as $namecheck)
			{
				$check=$namecheck->UserId;
			}
			if($check==NULL)
			{
				echo "OK";
			}
			else
			{
				echo "error";
			}
		}
		
		public function _register()
		{
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz
                   ABCDEFGHIJKLOMNOPQRSTUVWXYZ,./&amp;l
                  t;&gt;?;#:@~[]{}-_=+)(*&amp;^%$￡!';    //字符池
		for($i=0; $i<32; $i++)
			   {
				   $key .= $pattern{mt_rand(0,35)};    //生成php随机数
			   }
		$word = $_REQUEST["password"]."wibble".$key;
		$hased = sha1($word);
		
			$user = new user();			
			$user->New(array($_REQUEST["namechecks"],$hased,$key,"0",$_REQUEST["surname"],$_REQUEST["givename"],$_REQUEST["phone"],
			$_REQUEST["company"],$_REQUEST["department"],$_REQUEST["country"],$_REQUEST["comments-message-orga"],$_REQUEST["mail"]));
		}
		
		public function _login()
		{
                    	$columns = new columns();
			$columns->Get("all");
                       $this->values = array("cols"=>$columns);
			$this->RenderTemplate("login");
		}
		
		public function _logincheck()
		{
			$user =new user();
			$user->Get("all",array("UserName=".$_REQUEST['name']));
			
			$pattern = '1234567890abcdefghijklmnopqrstuvwxyz
                   ABCDEFGHIJKLOMNOPQRSTUVWXYZ,./&amp;l
                  t;&gt;?;#:@~[]{}-_=+)(*&amp;^%$￡!'; 
		
		foreach($user as $key)
		{
			$word = $_REQUEST["password"]."wibble".$key->Salt;
			$hased = sha1($word);
			if($hased == $key->PassWord)
			{
				$_SESSION["USERID"]=$key->UserId;
				$_SESSION["PERMISSION"]=$key->Permission;
				$_SESSION["USERNAME"]=$key->UserName;
				echo json_encode("true");
				return true;
			}
		}
		echo json_encode("false");
				 return false;
		
		
		}
		
	}
?>
