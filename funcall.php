<?php
require ('func.php');
if(isset($_REQUEST['action'])){
$act = $_REQUEST['action'];}
else{
$act='submit';
}
?><body bgcolor="lightgreen">
<table border=0 rules="none" align="center" >
   <tr>
        <td colspan=4> <?php echo '<p style="color: yellow;">SACCO</p>' ?><img src="saving.png" height="50" width="100" /><br>
	   
			
			<?php echo '<p style="color: yellow;">Login As</p>' ?>
			<a href="?action=login"><button>Administrator</button></a>
			<a href="?action=logi"><button>Member</button></a><br>
			<br>


	   <?php

    
    
         
			  //<!-- switch -->

switch($act){
	case "login":
		return login();//call the function

	case "logi":
		return memberlogin();	
		
case "homepage":
  return homepage();

case "memberpage":
	return memberpage();
break;
case "loanreports":
return loanreports();

break;
case "ideareports":
return ideareports();

break;
	case "contributionreports":
return contributionreports();



break;
case "register":
return register();


break;
case "contributions":
		
return contributions();


break;
		case "benefits":
return benefits();


break;
		case "ideas":
return ideas();

break;
		case "loandetails":
return loandetails();


break;
	case "viewfiles":
return viewfiles();

break;
	case "addmember":
return addmember();
	
	break;
	case "loanrequests":
return loanrequests();
	

}

?>


<br>
		</td>

   </tr>


</table>	  







<?php
//connect to database 

$c = mysqli_connect("localhost","root","");
If(!$c){  echo mysqli_error(); exit();}

$db = mysqli_select_db($c,"Sacco");
if(!$db){  echo mysqli_error(); exit();}



?>

</body>



