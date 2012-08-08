<?php
	function getmicrotime(){ 
		list($usec, $sec) = explode(" ",microtime()); 
		return ((float)$usec + (float)$sec); 
    } 
	function loadser()
	{
			$fp = fopen (APPLICATION_PATH."/lib/aclserialize.ser","r");
			$content = fread ($fp,filesize (APPLICATION_PATH."/lib/aclserialize.ser"));
			fclose($fp);
			$obj = unserialize($content);
			return $obj;
	}
function utf8_substr($str,$start) { 
    /*
    UTF-8 version of substr(), for people who can't use mb_substr() like me.
    Length is not the count of Bytes, but the count of UTF-8 Characters
    
    Author: Windix Feng
    Bug report to: windix(AT)gmail.com, http://www.douzi.org 

    - History -
    1.0 2004-02-01 Initial Version
    2.0 2004-02-01 Use PREG instead of STRCMP and cycles, SPEED UP!
    */ 

preg_match_all("/[x01-x7f]|[xc2-xdf][x80-xbf]|xe0[xa0-xbf][x80-xbf]|[xe1-xef][x80-xbf][x80-xbf]|xf0[x90-xbf][x80-xbf][x80-xbf]|[xf1-xf7][x80-xbf][x80-xbf][x80-xbf]/", $str, $ar);  

    if(func_num_args() >= 3) { 
        $end = func_get_arg(2); 
        return join("",array_slice($ar[0],$start,$end)); 
    } else { 
        return join("",array_slice($ar[0],$start)); 
    }
}
function page_creator($url,$curpage,$totalcount,$numperpage)
{
	$totalpage=ceil($totalcount/$numperpage);
	if($curpage>$totalpage+1) return "";
	$begin = (floor($curpage/$numperpage))*$numperpage;
	if($begin==0)$begin=1;
	$end= (floor($curpage/$numperpage)+1)*$numperpage;
	$end = $end<$totalpage+1?$end:$totalpage;
	$out = '<ul class="pagenav">';
	$pre = $begin-1;
	if($pre>0)
		$out.="<li><a href='{$url}&page={$pre}'><</a></li>";
	for($i=$begin;$i<=$end;$i++)
	{
		if($i==$curpage) $cls = "class='current'"; else $cls="";
		$out.="<li {$cls}><a  href='{$url}&page={$i}'>{$i}</a></li>";
	}
	$next = $end + 1;
	if($next<$totalpage)
		$out.="<li><a href='{$url}&page={$end}'>></a></li>";
	$out.="</ul>";
	return $out;
}
	function __autoload($classname)
	{
		require_once(APPLICATION_PATH."/controllers/controller.{$classname}.class.php");
	}
?>
