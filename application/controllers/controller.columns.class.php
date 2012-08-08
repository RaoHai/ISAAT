<?php

	require_once("controller.base.class.php");
	class columns extends ControllerBase
	{
		public function  __construct()
		{
			parent::__construct();
		}
		
		public function _index($id)//自定义你的action方法
		{
			$columns = new columns();
			$columns->Get("all");
			$content = new contents;
			$content->Get_By_parentId($id);
			
			if (empty($_REQUEST["json"])){
				$this->values = array("cols"=>$columns,"contents"=>$content);
				$this->RenderTemplate("index");
			}
			else echo $content->GetJson();
			
		}
		public function _get()
		{
			$columns = new columns();
			$columns->Get("all");
			echo $columns->GetJson();
		}
		public function _save()
		{
			$id = $_REQUEST["id"];
			$col = $_REQUEST["columnname"];
			$value = $_REQUEST["value"];
			if($col=="Name")$col ="columnsName";
			if($col=="Description") $col = "columnsDesc";
			if($col=="Display") $col="isshow";
			$columns = new columns();
			$columns->Set(array($col=>$value),array("ColumnsId={$id}"));
			echo json_encode(true);
		}
		public function _del($id)
		{
			$columns = new columns();
			$columns->Del_By_ColumnsId($id);
			echo json_encode(true);
		}
		public function _new()
		{
			$columns = new columns();
			$columns->columnsName="New Column";
			$columns->columnsDesc = "Discription";
			$columns->isshow = "1";
			$columns->save();
			echo json_encode(mysql_insert_id());
		}
	}
?>
