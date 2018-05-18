<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
		mysql_connect("localhost","root","") or die ("kết nối không thành công");
		mysql_select_db("db_music") or die  ("khong the ket noi db");
		$mabaihat=$_GET['id'];
		$baihat=mysql_query("select * from media where id ='".$mabaihat."'" );
		$baihathientai =  mysql_fetch_array($baihat);
		
		?>
        <br />
        <label><?php echo $baihathientai[1]; ?></label><br />
       	 <audio controls controlsList="nodownload">
       	 <source src="<?php echo $baihathientai[2]; ?>"><br />
   		 </audio><br/>
        <label><?php echo $baihathientai[3]; ?></label><br />
        
</body>
</html>