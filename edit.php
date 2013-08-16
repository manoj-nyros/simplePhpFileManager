<!DOCTYPE>
<html>
<head>
 <title>PFM-Edit</title>
  	<!-- Stylesheet reference -->
 <link href="/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
 <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen" />
 <link href="/bootstrap/css/jquery-ui.css" rel="stylesheet" media="screen" />
	<!-- External JScripts -->
 <script src="/bootstrap/js/jquery.js"></script>
 <script src="/bootstrap/js/jquery-ui.js"></script>
 <script src="/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
   <h1>PHP File Manager</h1>
  <div class="span11">
   <ul class="breadcrumb">
    <li><a href="PFMindex"> Home</a> <span class="divider">/</span></li>
    <li><a href="modify"> Modify Files</a> <span class="divider">/</span></li>
    <li class="active">Edit</li>
    <li class="pull-right">
      <form method="post" action="mail">
		<div class="ui-widpost">
		  <button class="btn btn-small" style="margin-top:-10px" type="submit">Search</button>
		  <input type="text" id="tags" name="file" value="filename" placeholder="Ex: file"/>
		</div>
	  </form>
    </li>
   </ul>
  </div>
 </div>
 <?php
	$txtname="";
   	$dir = "UploadFile/";
   	$file_array = array_diff(scandir($dir,1), array('..', '.'));
 ?>
	<?php
	 if(isset($_POST['text']))
	 {
	  file_put_contents("UploadFile/".basename($_POST['file']),$_POST['text']);
	  header("Location: ".$_SERVER['PHP_SELF']);
	  exit;
	 }
	 if(isset($_GET['file']))
	 {
	  $text = file_get_contents("UploadFile/".basename($_GET['file']));
	?>
   <div class="content">
     <form method="post">
      <input type="hidden" name="file" value="<?=urlencode($_GET['file'])?>">
      <? echo $_GET['file']." :-" ?>
      <textarea name="text"><?=$text?></textarea>
      <input type="submit" class="btn btn-primary" value="Save"/>
      <a class="btn btn-primary" href="modify">Cancel</a>
     </form>
	<?
	 }
	 else
	 {
	  $files = glob("UploadFile/*");
	  foreach ($files as $f)
	   {
	   if(mime_content_type($f)=="text/plain")
		{
		$f=basename($f);
	?>
		<div class="content">
		Edit&emsp;&rarr;<a href="?file=<?=urlencode($f)?>"><?=htmlspecialchars($f)?></a><br>
		</div>
	<?
		}
	   }
	}
	?>
  </div>
</body>
<!--Styles-->
<style>
body
{
 background:url(img/ptrn.jpg);
 display: compact;
}
textarea
{
 width:100%;height:200px;
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
 background-color:#fff;
 margin:auto;padding:10px;
 clear:both;color:black;
 width:900px;min-height:20px;
}
</style>
<!--Script-->
<script>
$( function() {
 var ary = <?php echo json_encode($file_array); ?>;
 $.each(ary, function (i, elem) {
    $( "#tags" ).autocomplete({
    	source: ary
    });
  });
});
</script>
</html>
