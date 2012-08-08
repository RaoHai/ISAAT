<?php
require_once(APPLICATION_PATH."/view/ui.class.php");
$ui = ui::getInstance() ;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ISAAT 2013</title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>

<body class="doc">
<div class="main">
  <div syle="text-align:right;margin-right:20px;">
  <a href="/"> Home </a>| Sitemap | Login | Contact <img src="images/arrow_gray.gif" width="6" height="12"></div>
  <div class="header"> </div>
  <div style="margin-left: 20px; margin-right: 20px; text-align: left;">
    <h2>16th International Symposium on Advances in Abrasive Technology </h2>
  </div>
  <div class="menu">
    <ul>
	 <a href="/"><li>Home</li></a>
	<?php foreach($this->values["cols"] as $col) {  ?>
		 <a href="columns/<?php echo $col->ColumnsId; ?>"><li><?php echo $col->columnsName; ?></li><a>
	<?php } ?>
    
    </ul>
  </div>
  <div class="content">
    <div class="left-nav">
      <div class="title">
        <h2>
        Home
        <h2>
      </div>
      <div class="subtitle">
        <h3>History & Scope</h3>
      </div>
    </div>
    <div class="right-nav">
      <div class="text"> <p>The International Symposium on Advances in Abrasive Technology (ISAAT) was first held in Sydney, Australia in 1997. Since 2002, JSAT and ICAT have been jointly organizing this exciting annual event for this community and the symposia have been successfully held in US, China, Russia, UK, Turkey, Korea, Hong Kong, Japan and Taiwan.</p>
      <p>
      An emphasis of the ISAAT series is to bring together both academic researchers and industrial practitioners from around the world for interchange of the latest developments and applications in abrasive technologies. The ISAAT 2011 at Stuttgart (Germany) will continue to promote the research collaboration and to establish a platform to explore the frontier of abrasive technology. </p>
      <p>
      <table><tr><td>
<b>organized by:</b></br>
Institute of Grinding and Precision Technology, KSF</br>

KSF-Director & Conference Chairman:</br>

Prof. Dr.-Ing. T. Tawakoli</p>
      <img src="images/KSF.png" width="167" height="82">
      <img src="images/Logo_HFU_4c.jpg" width="217" height="88">
      </td><td>
      <p>
<b>Symposium Secretariat</b>
Mrs. Maria Kohmann</br>
Jakob-Kienzle-Straße 17</br>
D-78054 Villingen-Schwenningen</br>
Phone: +49 7720 307 4328</br>
Fax: +49 7720 307 4208</br>
E-Mail: isaat2011@hs-furtwangen.de</br>
</p></td></tr></table></div>
    </div>
  </div>
</div>
<div class="footer">
    <div style="font-family: 'Khmer UI'; float: none; text-align: right; margin-right: 20px;" >
    © 2012 surgesoft
     </div>
</div>
</body>
</html>
