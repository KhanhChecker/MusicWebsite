
<!DOCTYPE html>
<html lang="en">
<?php include 'quickstart.php' ?>

<?php 

session_start();
 

echo $_SESSION['username'];
 if (!isset($_SESSION['username'])) {
     header('Location: admin/login.php');}
     if(strcmp($_SESSION['username'],'admin')!=0){
        ?>
        <style type="text/css">#SerchForm{
        display:none;
        }</style>
        <?php
        }    
    ?>
    
  
<a href="admin/logout.php">Đăng xuất</a> 
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
		$link = mysql_connect("localhost","root","") or die ("kết nối không thành công");
		mysql_select_db("db_music") or die  ("khong the ket noi db");
		
		$list = mysql_query("select * from media");
		
		?>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Web nghe nhạc miễn phí</h1>
 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
 	 <form method="POST" action="index.php" enctype="multipart/form-data"   id="SerchForm">
            <input type="file" name="file"  multiple style="background-color:#FFF" >
            <input type="submit" value="Upload" name="upload">
        </form>
    <?php
    
    if(isset($_POST['upload'])){
     $name = $_FILES['file']['name'];
     $path = 'files/'.$_FILES['file']['name'];
     $fileMetadata = new Google_Service_Drive_DriveFile(array(
     'name' => $name));
      $content = file_get_contents($path);
       $file = $service->files->create($fileMetadata, array(
      'data' => $content,
      'mimeType' => 'audio/mpeg',
      'uploadType' => 'multipart',
      'fields' => 'id'));

      $sql = "INSERT INTO media (tenbaihat, path, tacgia)
      VALUES ('$name', '$file->id', '  ')";
      mysql_query($sql);
      header("Location: http://localhost:8080/mp3/"); 
exit;
    
  
     
    }
  

     
    ?>  
</nav>


    <div class="col-sm-8">
      <p1>
      <?php while ($row = mysql_fetch_array($list))
		{
		?>
            <a href="baihat.php?id=<?php echo $row [0];?>"><?php echo $row [1];?></a><br/>
        <?php    
		} 
	?></p1>

    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Phạm Hoàng Việt Khánh - N14DCAT019</p>
</div>

</body>
</html>