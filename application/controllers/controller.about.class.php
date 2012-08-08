<?php

	require_once("controller.base.class.php");
	class about extends ControllerBase
	{
		public function  __construct()
		{
			parent::__construct();
		}
		
		public function _index($p)//自定义你的action方法
		{
			$childColumns = new childColumns();
			$childColumns->model->Get_By_parentColumns(1);
			$colunms = $childColumns->model->getresult();
			
			foreach($colunms as $co)
			{
				if(!isset($p)||empty($p)) $p = $co->ChildColumnsId;
				$leftnav[]=array("id"=>$co->ChildColumnsId,"name"=>$co->childColumnsName);
			}
			$contents = new contents();
			$contents->model->Get_By_parentId($p);
			$content = $contents->model->getresult();
			foreach($content as $t)
			{
				$title = $t->contentsName;
				$img   =rawurldecode($t->titleImage);
				$body = rawurldecode($t->contentsText);
			}
			global $_tab_header;
			$this->values=array("nav"=>$_tab_header,"leftnav"=>$leftnav,"p"=>$p,"text"=>$body,"img"=>$img);
				$this->RenderTemplate("about");
		}
	}
?>
