<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
	<?php
		mysql_connect("localhost","root","") or die ("kết nối không thành công");
		mysql_select_db("db_music") or die  ("khong the ket noi db");
		
		$list = mysql_query("select * from media");
		
		while ($row = mysql_fetch_array($list))
		{
		?>
            <a href="baihat.php?id=<?php echo $row [0];?>"><?php echo $row [1];?></a><br/>
        <?php    
		} 
	?>
<body>
</body>
</html>