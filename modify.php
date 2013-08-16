<!DOCTYPE>
<html>
<head>
 <title>PFM-ModifyFile</title>
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
    <li class="active">Modify Files</li>
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
	<?php
	 if (!file_exists("UploadFile"))
     {
      mkdir("UploadFile", 0777);
     }
	 $txtname="";
	 $dir = "UploadFile/";
	 $file_array = array_diff(scandir($dir,1), array('..', '.'));
	?>
  <div class="content">
   <form enctype="multipart/form-data" method="post">
    <div class="span7">
     <table class="table table-hover">
      <thead style="background-color:#563D7C;color:#fff">
       <tr>
        <th> List of files </th>
       </tr>
      </thead>
	<?php
	$files = glob("UploadFile/*");
	foreach($files as $txt)
	{
	  $txtname = basename($txt);
	  echo "<tr><td><input type='radio' name='txt' value='$txtname'/>&emsp;".$txtname."</td></tr>";
	}
	   ?>
     </table>
    </div>
       <div class="span5">
        <button type="submit" class="btn btn-primary" name="submit" value="Delete" id="del">Delete this file</button>
        <button type="submit" class="btn btn-primary" name="submit" value="Edit">Edit text files in root</button>
       </div>
	  <?php
	  global $txtname;
	  $val = $_POST["submit"];
	  $txtname = $_POST["txt"];
	   if($val=="Delete") {
		  unlink("UploadFile/".$txtname);
		  header("Location:/Assignment6/modify");
		}
	   else if($val=="Edit")
	    header('Location:/Assignment6/edit');
	  ?>
    </form>
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
.span7
{
 height:200px;
 padding:30px;
 overflow-x:auto;
}
.span5
{
 padding:20px;
 display:none;
}
.content
{
 background-color:#fff;
 border-radius:5px;
 margin:auto;padding:10px;
 clear:both;color:black;
 width:900px;height:250px;
}
.form-search
{
 margin-top:-5px;
}
.form-search input
{
 height:auto;
}
#tags
{
 height:25px;
}
#cnfrm
{
 display:none;
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

	$("input").change(function(){
		$('.span5').css('display','block');
	/*	$("#del").click(function() {
			alert('File deleted');
		 });	*/
	});

});
</script>
</html>
