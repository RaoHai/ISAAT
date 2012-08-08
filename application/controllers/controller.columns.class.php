<?php

	require_once("controller.base.class.php");
	class columns extends ControllerBase
	{
		public function  __construct()
		{
			parent::__construct();
		}
		
		public function _index()//自定义你的action方法
		{
		
			
		}
		public function _g($id)
		{
			$childColumns = new childColumns();
			$childColumns->model->Get_By_parentColumns($id);
			$re = $childColumns->model->getresult();
			echo rawurldecode(json_encode($re));
		}

	}
?>
