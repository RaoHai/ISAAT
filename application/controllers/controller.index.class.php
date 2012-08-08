<?php

	require_once("controller.base.class.php");
	class index extends ControllerBase
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
			$this->RenderTemplate("index");
		}
		
		
	}
?>
