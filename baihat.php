<!DOCTYPE html>

<html lang="en">

<head>
  <title>Web nhac</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>
	<?php
		mysql_connect("localhost","root","") or die ("kết nối không thành công");
		mysql_select_db("db_music") or die  ("khong the ket noi db");
		
		$list = mysql_query("select * from media");
		
		?>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Web nghe nhạc miễn phí</h1>
 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<form action="index.php" method="post"
 	<div class="seachform">
    
    	<input type="text" id="serchf" name="serchtext" size="25" placeholder="Tên bài hát ...">
        <input type="submit" id="searchbtn" value="search" >
     
     </div>
     </form>   
</nav>


    <div class="col-sm-8">
      <p1>
     <?php
		mysql_connect("localhost","root","") or die ("kết nối không thành công");
		mysql_select_db("db_music") or die  ("khong the ket noi db");
		$mabaihat=$_GET['id'];
		$baihat=mysql_query("select * from media where id ='".$mabaihat."'" );
		$baihathientai =  mysql_fetch_array($baihat);
		
		?>
        <br />
        <label><?php echo $baihathientai[1]; ?></label><br />
       	 <audio controls >
       	 <source src="https://docs.google.com/uc?export=download&id=<?php echo $baihathientai[2]; ?>"><br />
   		 </audio><br/>
        <label><?php echo $baihathientai[3]; ?></label><br /></p1>

    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Phạm Hoàng Việt Khánh - N14DCAT019</p>
</div>

</body>
</html>