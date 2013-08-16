<!DOCTYPE>
<html>
<head>
 <title>PFM-UploadFile</title>
  	<!-- Stylesheet reference -->
 <link href="/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
 <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen" />
	<!-- External JScripts -->
 <script src="/bootstrap/js/jquery.js"></script>
 <script src="/bootstrap/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
<h1>PHP File Manager</h1>
 <div class="span11">
  <ul class="breadcrumb">
   <li><a href="PFMindex"> Home</a> <span class="divider">/</span></li>
   <li class="active">Upload Files</li>
  </ul>
  <div class="content">
   <div class="span9">
  <form class="form-horizontal" enctype="multipart/form-data" method="post" style="margin-top:30px">
	<div class="control-group">
	 <label class="control-label" for="selectfile"><b>Select a file:</b></label>
		  <div class="controls">
		<input type="file" name="image" />
		<input type="submit" class="btn btn-primary" value="Upload" name="submit" />
		  </div>
<?php
include('SimpleImage.php');

	 if (!file_exists("UploadImage"))
     {
      mkdir("UploadImage", 0777);
     }

if($_POST["submit"]=="Upload")
{
  if($_FILES['image']['error']>0)
  {
    echo "<div class='alert alert-error'><a class='close' data-dismiss='alert'>&times</a><b>Error..!</b> No file selected for upload</div>";
    }
  else
  {
  	$validImg = array('.jpg','.jpeg','.gif','.png');
  	$file = strrchr($_FILES['image']['name'], ".");
  	if(in_array($file, $validImg))
  	{
	  move_uploaded_file($_FILES["image"]["tmp_name"], "UploadImage/".$_FILES["image"]["name"]);
  	  echo "<div class='alert'><a class='close' data-dismiss='alert' href=''>&times;</a><b>Success..!</b> Image uploaded</div>";
		function SmallImg()
		{
			$img = new SimpleImage();
			$img->load('UploadImage/'.$_FILES['image']['name']);
			$img->resize(50,50);
			$img->save('UploadImage/50*50'.$_FILES["image"]["name"]);
			}
		function LrgImg()
		{
			$img = new SimpleImage();
			$img->load('UploadImage/'.$_FILES["image"]["name"]);
			$img->resize(100,100);
			$img->save('UploadImage/100*100'.$_FILES["image"]["name"]);
			}
		SmallImg();
		LrgImg();
		echo "<div class='span6'><p><u>Original Image</u></p><img src='UploadImage/".$_FILES["image"]["name"]."'/></div>";
		echo "<div class='span2' style='margin-bottom:20px'><p><u>50x50</u></p><img src='UploadImage/50*50".$_FILES["image"]["name"]."'/></div>";
		echo "<div class='span2'><p><u>100x100</u></p><img src='UploadImage/100*100".$_FILES["image"]["name"]."'/></div>";
 	  }
  	else
  	  {
  	  move_uploaded_file($_FILES["image"]["tmp_name"], "UploadFile/".$_FILES["image"]["name"]);
	  echo "<div class='alert alert-error'><a class='close' data-dismiss='alert'>&times;</a><b>Error:</b> Text files can't be edited/Not supported image format</div>";
	  }
	}
}
?> 		
	</div>
  </form>
   </div>
  </div>
 </div>
</div>
</body>
<!--Styles-->
<style>
body
{
 background:url(img/ptrn.jpg);
 display: compact;
}
.container
{
 margin-top:20px;
 padding:10px 10px 10px 20px;
 border-radius:5px;
 border:1px solid blue;
 background-color:#E06560;
 color:white;
}
.content
{
 background-color:#fe9;
 border-radius:5px;
 margin:auto;padding:10px;
 clear:both;color:black;
 width:900px;height:500px;
}
.alert
{
 margin-bottom:10px;
}
img
{
 border:3px solid white;
}
</style>
</html>
