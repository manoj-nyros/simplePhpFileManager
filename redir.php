<?php
if(isset($_POST['op']))
{
 if($_POST['op']=='op1')
   header('Location: upload');
 else if($_POST['op']=='op2')
   header('Location: modify');
else
{
 echo 'No file found';
 exit();
}
}
?>
