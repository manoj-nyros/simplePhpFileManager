<!DOCTYPE>
<html>
<head>
 <title>PHP File Manager</title>
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
  <hr>
  <a class="btn btn-primary">PFM</a>
 <div class="span11">
 <p>Select task to do</p>
  <form class="form-horizontal" method="post" action="redir.php">
	 <div class="radio">
	 <label>
	  <input type="radio" name="op" id="op1" value="op1">
	  <h5>Upload New</h5>
	 </label>
	</div>
	<div class="radio">
	 <label>
	  <input type="radio" name="op" id="op2" value="op2">
	  <h5>Modify existing</h5>
	 </label>
	</div>
	<button type="submit" id="sbmt" value="submit" class="btn btn-warning"> Go </button>
	<div class="alert">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  You haven't selected any option.<span style="color:red;font-weight:bold"> Select one</span> & continue...!
	</div>
  </form>
 </div>
</div>
</body>

<!--Style-->
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
 text-align:center;
 border:1px solid blue;
 background-color:#E06560;
 color:white;
}
.span11
{
 background-color:#eee;
 border-radius:5px;
 padding: 10px;
 display:none;
 text-align:left;
 color:black;
}
.alert
{
 margin:10px;
 text-align:center;
 display:none;
}
.radio:hover
{
 background-color:#B9B9B8;
}
</style>

<!--Script-->
<script>
$( function(){
	$("a").click(function(){
		$('.span11').slideToggle();
	});
$('#sbmt').click(function() {
 if (!$("input[name='op']:checked").val())
 {
  $('.alert').css('display','block');
  return false;
   }
 else
 {
  $('.alert').css('display','none');
   }
 });
});
</script>
</html>
