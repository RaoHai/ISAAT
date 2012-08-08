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
		public function _save()
		{
			$id = $_REQUEST["id"];
			$title = $_REQUEST["title"];
			$subtitle = $_REQUEST["subtitle"];
			$text = $_REQUEST["content"];
			$parentid = $_REQUEST["parentid"];
			$content = new contents;
			if(empty($id))
			{
				$content->contentsName = $title;
				$content->Summary = $subtitle;
				$content->contentsText = $text;
				$content->parentId = $parentid;
				$content->save();
			}
			else
			{
				$content->Set(array("contentsName"=>$title,"Summary"=>$subtitle,"contentsText"=>$text),array("ContentsId={$id}"));
			}
			echo json_encode(true);
		}
	}
?>
