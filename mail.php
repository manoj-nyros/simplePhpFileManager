<?php
 $content="";
 $filename = $_POST["file"];
 $content = file_get_contents("UploadFile/".$filename);
?>

<!DOCTYPE>
<html>
<head>
 <title>PFM-Mail</title>
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
    <li class="active">Mail</li>
    <li class="pull-right">
      <form method="post" action="mail">
		<div class="ui-widpost">
		  <button class="btn btn-small" style="margin-top:-10px" type="submit">Search</button>
		  <input type="text" id="tags" name="file" value="filename" placeholder="Ex: file"/>
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
	  </form>
    </li>
   </ul>
  </div>
 </div>
 <div class="content">
 
  <div class="span4">
   <p> <u>Content preview :-</u> </p>
   <div class="span3">
    <? echo $content; ?>
   </div>
  </div>
  <div class="span2">
   <form method="post">
    Enter mail id:<input type="text" id="email" name="email" placeholder="e-mail id" />
	File content:<textarea name="txt" id="txt" rows="5"> <? echo $content; ?> </textarea>
    <button class="btn btn-primary" type="submit" id="send" name="send" value="Send">Send Mail</button>
    <a class="btn btn-primary" href="modify">Cancel</a>
   <?php
   $to = $_POST["email"];
   $subject = "Test mail:";
   $message = $_POST["txt"];

 $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= 'From: Manoj <admin@gmail.com>' . "\r\n";

     if(isset($_POST["send"]))
    {
     if($_POST["email"]!="")
     {
      mail($to,$subject,$message,$headers);
     echo "<div class='alert alert-success' id='MailSuccess' style='margin-top:10px'> Mail sent </div>";
     }
	else
   	 echo "<div class='alert alert-error' id='MailError'>Error sending mail..! enter valid data </div>";
   	}
   ?>
   </form>
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
textarea
{
 overflow-y:auto;
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
 width:900px;height:300px;
}
.span3
{
 border:1px solid;
 background-color:#fef;
 margin:5px;padding:5px;
 height:220px;
 word-wrap:break-word;
 overflow-y:auto;
}
#tags
{
 height:25px;
}
#email
{
 height:30px;
}
</style>

<!--Script-->
<script>
$(function(){
 var ary = <?php echo json_encode($file_array); ?>;
 $.each(ary, function (i, elem) {
    $( "#tags" ).autocomplete({
    	source: ary
    });
  });
 $("#send").click(function(){
	var mailid = document.getElementById("email").value;
	var MailPatt = /^([0-9A-z._-])+@([0-9A-z])+\.([0-9A-z]+)$/;
	if(MailPatt.test(mailid))
	{
	 $("#MailSuccess").css("display","block"),
	 $("#MailSuccess").html("Mail sent");
	 return true;
	}
	else
	{
	 $("#MailError").css("display","block"),
	 $("#MailError").html("Enter valid mail-id");
	 return false;
	}
 });
});
</script>
</html>
