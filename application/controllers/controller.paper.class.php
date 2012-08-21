<?php

	require_once("controller.base.class.php");
	class paper extends ControllerBase
	{
		public function  __construct()
		{
			parent::__construct();
		}
		
		public function _index()//自定义你的action方法
                {
                    //$mypaper = new paper();
                        $id = $_SESSION['USERID'];
                    	$columns = new columns();
			$columns->Get("all");
                        $papers = new paper();
                        $papers->Get_By_authorId($id);
                        $haspaper = false;
                        if(empty($papers->items))
                            $haspaper=false;
                        else $haspaper=true;
                        $firstpaper;
                        foreach($papers as $paper)
                        {
                            if(empty($firstpaper))
                                $firstpaper = $paper;
                        }
                        $paperid = $firstpaper->PaperId;
                        $paperfile = new paperfile();
                        $paperfile->Get_By_paperId($paperid);
                        $this->values = array("cols"=>$columns,"haspaper"=>$haspaper,"paperfile"=>$firstpaper,
                            "papertitle"=>$firstpaper->PaperName,"Summary"=>$firstpaper->summary,"time"=>$firstpaper->changetime,
                            "paperid"=>$firstpaper->PaperId,"comment"=>$firstpaper->comments,"statu"=>$firstpaper->statu,"paperfile"=>$paperfile);
			$this->RenderTemplate("index");
                }
                public function _submit()
                {
                    $paper_title = $_REQUEST["paper_title"];
                    $paper_summary = $_REQUEST["paper_summary"];
                    $paper_keyword = $_REQUEST["paper_keyword"];
                    // $paper_file = $_REQUEST["paper_file"];
                    if($_FILES['paper_file']["size"]<2000000)
                        move_uploaded_file($_FILES["paper_file"]["tmp_name"],
                            BASE_PATH."/upload/" . $_FILES["paper_file"]["name"]);
                    $paper = new paper();
                    $paper->PaperName = $paper_title;
                    $paper->summary = $paper_summary;
                    //$paper->filename = $_FILES["paper_file"]["name"];
                    $paper->authorId= $_SESSION['USERID'];
                    $paper->save();
                    $id = mysql_insert_id();
                    $paperfile = new paperfile();
                    $paperfile->PaperfileName = $_FILES["paper_file"]["name"];
                    $paperfile->paperId = $id;
                    $paperfile->submittime = date("Y-m-d H:i:s");
                    $paperfile->authorId = $_SESSION['USERID'];
                    $paperfile->save();
                    
                    header("location: /paper"); 
                }
                public function _new()
                {
                    $id = $_REQUEST["id"];
                   if($_FILES['file']["size"]<2000000)
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                            BASE_PATH."/upload/" . $_FILES["file"]["name"]); 
                    $filename = $_FILES["file"]["name"];
                    $paperfile = new paperfile();
                    $paperfile->paperId = $id;
                    $paperfile->PaperfileName = $filename;
                    $paperfile->authorId = $_SESSION['USERID'];
                    $paperfile->save();
                }
                public function _del($id)
                {
                    $userid = $_SESSION["USERID"];
                    $paperfile = new paperfile();
                    $paperfile->Del(array("PaperfileId={$id}","authorId={$userid}"));
                }
	}
?>
