<?php

	require_once("controller.base.class.php");
	class contents extends ControllerBase
	{
		public function  __construct()
		{
			parent::__construct();
		}
		
		public function _index($param)//自定义你的action方法
		{
			global $_tab_header,$_tab_footer;
			/*$this->model->Get_By_ContentsId($param);
			$content = $this->model->getresult();
			foreach($content as $co)
			{
				$text = $co->contentsText;
				$title = $co->contentsName;
				$img = $co->titleImage;
			}
			$this->values=array("nav"=>$_tab_header,"img"=>$img,"content"=>$text,"title"=>$title,"footer"=>$_tab_footer);
			$this->RenderTemplate("contents");*/
			//var_dump($this->model->getresult());	
			
		}
	}
?>
