<?php

function login(){
	?>
<style type="text/css">

.login-page{
width:360px;
padding:8% 0 0;
margin: auto;
}
.form{
position: relative;
z-index: 1;
background: #ffffff;
max-width:360px;
margin: 0 auto 100px;
padding:45px;
text-align:center;
box-shadow:0 0 20px 0rgba(0,0,0,0.2),0 5px 5px 0 rgba(0,0,0,0.24);
}
	.form h3{
	color:blue;
	}
.form input{
font-family:"Roboto",sans-serif;
outline:0;
background:#f2f2f2;
width:100%
border:0;
margin:0 0 15px;
padding:15px;
box-sizing:border-box;
font-size:14px;
}
.button{
font-family:"roboto",sans-serif;
text-transform:uppercase;
outline:0;
background:#4CAF50;
width:100%
border:0;
padding:15px;
color:blue;
font-size:14px;
-webkit-transition:all 0.3 ease;
transition:all 0.3 ease;
cursor:pointer;
}
	body{
background:url("uk.jpg") no-repeat; background-size:100% 100%;background-position:8px 9x; text-align="center";
}
</style>
<?php
session_start();
if (isset($_POST['submit'])) {
	# code...
	$db = mysqli_connect('localhost','root','','Sacco')
 or die('Error connecting to MySQL server.');
 $username=$_POST['username'];
 $password=$_POST['password'];
 if($username!=''&&$password!='')
 {
   $query=mysqli_query($db,"SELECT * FROM Administrator WHERE Username='".$username."' and Password='".$password."'") or die(mysql_error());
   $res=mysqli_fetch_row($query);
   if(!$res)
    {
    echo'<p style="color: yellow;">!!incorrect username or password</p>';
   }
	 else
	{
		header ('location:?action=homepage');
	}
 }
}
?>

<?php
echo'
		<div class="login-page">
	<div class="form">
<form class="login-form" method="POST">
<h3>ADMINISTRATOR</h3>
	Username: <input type="text" name="username" placeholder="username"><br>
	Password: <input type="password" name="password" placeholder="password">
	<input type="submit" value="login" name="submit" class="button" >
	</form>
		</div> 
	</div>';
	

?>
<?php
}
?>

<?php
function homepage(){
?>

<style>
	body{
 background:url("spot.jpg") no-repeat; background-size:100% 100%;background-position:8px 9x; text-align="center";
}
#btn{

	height:80px;
	width:300px;
}
	</style>
}

<body>
<div><?php Adminmenu();?></div>
</div><br>
		<table>
	<tr><th><h1 >Administrator Interface</h1></th></tr>
	<tr><td><a href="?action=contributions"><button id="btn">Contribution Management</button></a></td>
		<td><a href="?action=benefits"><button id="btn"> Benefit Management</button></a></td></tr>
		<tr><td><a href="?action=loandetails"><button id="btn">Loan Management</button></a></td>
		<td><a href="?action=ideas"><button id="btn">Idea Management</button></a></td></tr>
	</table>
</body>
		
	



<?php
}
?>
<?php
function memberlogin()
{

	?>
<style type="text/css">

.login-page{
width:360px;
padding:8% 0 0;
margin: auto;
}
.form{
position: relative;
z-index: 1;
background: #ffffff;
max-width:360px;
margin: 0 auto 100px;
padding:45px;
text-align:center;
box-shadow:0 0 20px 0rgba(0,0,0,0.2),0 5px 5px 0 rgba(0,0,0,0.24);
}
	.form h3{
	color:blue;
	}
.form input{
font-family:"Roboto",sans-serif;
outline:0;
background:#f2f2f2;
width:100%
border:0;
margin:0 0 15px;
padding:15px;
box-sizing:border-box;
font-size:14px;
}
.button{
font-family:"roboto",sans-serif;
text-transform:uppercase;
outline:0;
background:#4CAF50;
width:100%
border:0;
padding:15px;
color:blue;
font-size:14px;
-webkit-transition:all 0.3 ease;
transition:all 0.3 ease;
cursor:pointer;
}
	body{
background:url("uk.jpg") no-repeat; background-size:100% 100%;background-position:8px 9x; text-align="center";
}
</style>
<?php
	if (isset($_POST['submit'])) {
	# code...
	$db = mysqli_connect('localhost','root','','Sacco')
 or die('Error connecting to MySQL server.');
 $username=$_POST['username'];
 $password=$_POST['password'];
 if($username!=''&&$password!='')
 {
   $query=mysqli_query($db,"SELECT * FROM Member WHERE FirstName='".$username."' and Password='".$password."'") or die(mysql_error());
   $res=mysqli_fetch_row($query);
   if(!$res)
    {
    echo'<p style="color: yellow;">!!incorrect username or password</p>';
   }
	 else
	{
		header ('location:?action=memberpage');
	}
 }
}

	
echo'
		<div class="login-page">
	<div class="form">
<form class="login-form" method="POST">
<h3>MEMBER</h3>
	Username: <input type="text" name="username" placeholder="username"><br>
	Password: <input type="password" name="password" placeholder="password">
	<input type="submit" value="login" name="submit" class="button">
	</form>
		</div> 
	</div>';



?>

<?php
}
?>
<?php
function memberpage()
{
	
?>
<style type="text/css">
		
		 ul {
list-style: none;
padding: 0px;
margin: 0px;	 
}
		h1{
			text-shadow:4px 2px 3px #4ff334;
			height:35px;
			font-size:20px;
			font-weight:bold;
			text-align:center;
			color:lightyellow;
		}
		
#menu{
			width:1100px;
			height:60px;
			font-size:16px;
			font-weight:bold;
			text-align:center;
			text-shadow:3px 2px 3px #333333;
			background-color:#8AD9FF;
			border-radius:8px;
		}
		#menu ul{
			height:auto;
			padding:8px 0px;
            margin:0px;
		}
		#menu li{
			display:inline;
			padding:20px;
		}
  ul li {
display: block;
position: relative;
float: left;
border:0px solid #000
}
  li ul {
display: none;
}
  ul li a {
display: block;
text-decoration: none;
color: #fff;
	  margin:0 auto;
}
  ul li a:hover {
background: purple;
}
  li:hover ul {
display: block; 
position: absolute;
}
  li:hover li {
float: none;
}
  li:hover a {
background:purple;
}
  li:hover li a:hover {
background: #000;
}
 body{
 background:url("spot.jpg") no-repeat; background-size:100% 100%;background-position:100% 100%; text-align="center";
}
#btn{
	height: 80px;
	width: 200px;
}
	</style>
}

<body>
<h1><center><?php echo 'THE SACCO MANAGEMENT SYSTEM' ?></center></h1>
<div id="menu" align="center">
	<center><ul>
		<li><a href="?action=memberpage">homepage</a></li>
		
	<li><a href="?action=ideareports">idea</a></li>
	
</ul></center>
</div><br>

<table>
	<tr><th><h1>Member Interface</h1></th></tr>
	<tr><td><a href="?action=contributionreports"><button id="btn">Contribution Reports</button></a></td>
		<td><a href="?action=ideareports"><button id="btn">Idea Reports</button></a></td></tr>
		<tr><td><a href="?action=loanreports"><button id="btn">Loan Reports</button></a></td>
		
	</table>
</body>

<?php
}
?>

<?php
//function to view text file content
function viewfiles(){
	
	?>
	<div><?php Adminmenu();?></div>
<div><h1><img src="file.png" alt="Mountain View" style="width:200px;height:100px;"/>Pending Files......... </h1></div><br/><br />
<br/><div><style>
	h1{
		color:white;
	}
	tr{
	background-color:silver;
		width:25px;
		color:black;
	}
	input{
	background-color:green;
	width:150px;
		height:40px;
		border-radius:5px;
		color:white;
	}
	th{
		background-color:blue;
		color:white;
	}
</style>
	<?php textarea();?></div>
	
	
<?php }
?>


<?php
function textarea(){
	$lines = file('test.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$i=1;
	echo "<table border='2'style='background-color:#FFFFFF;border-collapse:collapse;border:2px solid #6699FF;color:#000000;width:800'>";
	echo "<tr><th>File Number</th><th>File</th><th>Verify</th></tr>";
	foreach($lines as $file){
		
		
		
?>

<tr>
	
    <td>
        <?php echo $i++;?>

    </td>
    <td>
        <?php echo $file;?>
    </td>
    <td>
        <form method="post">
            <input type="hidden" name="form" value="<?php echo $file; ?>" />
            <input type="submit" name="Accept" value="Accept"/>
			 <input type="submit" name="Deny" value="Deny" />
        </form>
    </td>
</tr


<?php
	}

echo "</table>";
	if(isset($_POST['Accept'])){
		//$array=explode("\t",$file);
	list($a,$b,$c,$d)=explode(" ",$file,4);
		//var_dump($name,$amount,$date);
		$con=mysqli_connect("localhost","root","","Sacco");
		//$db=mysqli_select_db($con,"Sacco");
		if($a=="contribution"){
		$query=mysqli_query($con,"insert into contributions(name,Amount,Date) values('$b','$c','$d')");
		if($query){
		echo "contribution is inserted  successfully";
		//cutline('test.txt',$file);	
			
		}else{
		echo "Error: boss";
		}		
		}
		else if($a=="LoanRequest"){
                
             $query=mysqli_query($con,"insert into LoanRequest(Name,Amount,Date) values('$b','$c','$d')");
				if($query){
					echo "Data successfully entered";
				}else{
					echo "Data not entered";
				}			
		}
		else if($a=="idea"){
		$query=mysqli_query($con,"insert into Idea(Name,Description,InitialCapital) values('$b','$c','$d')");
		if($query){
		echo "idea  inserted successfully";
			
			
		}else{
		echo "Error: boss";
		}
		}
		else{
		echo "This is nothing majje";
		}
		
		cutline('test.txt',$file);
		
	}
	
}

//function  for cut line from the text file
function cutline($filename,$line_no) {
	

$strip_return=FALSE;

$data=file($filename);
$pipe=fopen($filename,'w');
$size=count($data);
foreach($data as $line_no){
if($line_no) $skip=$size-1;
else $skip=$line_no-1;
}
for($line=0;$line<$size;$line++)
if($line!=$skip)
fputs($pipe,$data[$line]);
else
$strip_return=TRUE;

return $strip_return;
} 

?>
	






<?php
//function for adding new member
function addmember(){
	
?>
	<style type="text/css">
	.data{
	width:400px;
	height:50px;
	border-radius:5px;
	}
	label{
		color:white;
	}
	form{
	background-color:silver;
	text-align:center;
	border-radius:5px;
	
	}
	.sub{
		background-color:green;
		width:150px;
		height:50px;
		border-radius:5px;
	}
	h3{
	color:red;
	}
</style>
<div><?php Adminmenu();?></div>
	<div float=""><form method="post" >
		<h3><img src="loan.png" alt="Mountain View" style="width:150px;height:100px;"/>Add New Member</h3>
	<table>
	<tr>
		<td><label>First Name:</label></td><td><input class="data" type='text' name='first' placeholder='First Name'></td>
		</tr>
		<tr>
		<td><label>Last Name:</label></td><td><input type='text' class="data" name='lastname' placeholder='Last Name'></td>
		</tr>
		<tr>
		<td><label>Username Name:</label></td><td><input type='text' class="data"  name='username' placeholder='Username'></td>
		</tr>
		<tr>
		<td><label>Password Name:</label></td><td><input type='password' class="data" name='pass' placeholder='User Password'></td>
		</tr>
		<tr>
		<td><label>Contribution:</label></td><td><input type='text'  class="data" name='contribution' placeholder='Contribution'></td>
		</tr>
		<tr>
		<td><label>Receipt Number:</label></td><td><input type='text' class="data"  name='receipt' placeholder='Receipt Number'></td>
		</tr>
		<tr>
		<td><label>Date:</label></td><td><input type='date' name='date' class="data" placeholder='Date of Entry'></td>
		</tr>
		
		
	</table>
		
		<input type='submit' class="sub" name='member' value='Add Member'/>
		
</form>
<?php
	if(isset($_POST['member'])){
		$con=mysqli_connect("localhost","root","","Sacco");
		$first=$_POST['first'];
		$last=$_POST['lastname'];
		$username=$_POST['username'];
		$Password=$_POST['pass'];
		$contribution=$_POST['contribution'];
		$receipt=$_POST['receipt'];
		$date=$_POST['date'];
		
		
		$rowSQL = mysqli_query( $con ,"SELECT MAX( Amount ) AS Amount FROM contributions;" );
		$row = mysqli_fetch_array( $rowSQL );
		$largestNumber = $row['Amount'];
			if($contribution>=3/4*$largestNumber){
			$d ="insert into Member(FirstName,LastName,Username,Password) values('$first','$last','$username','$Password')";
		$c ="insert into contributions(name,Amount,Date) values('$username','$contribution','$date')";
		$me=mysqli_query($con,$d);
		$me=mysqli_query($con,$c);
			}
		else{
			echo "Member Denied";
		}
		
		
		

	
		
		
	}
}	
?><?php
function loandetails(){

?>
	<div><?php Adminmenu();?></div>
<form>
	<h3>Enter Loan Repayment Details</h3>
<table>
<tr>
<td><label>Loan ID:</label></td><td><input type='text' name='loanid' placeholder='Enter Loan ID'/></td>	
</tr>
	<tr>
<td><label>Details:</label></td><td><input type='text' name='loanid' placeholder='Enter loan Detials'/></td>	
</tr>
	<tr>
<td><label>Intrest Rate:</label></td><td><input type='text' name='loanid' placeholder='Enter Intrest Rate'/></td>	
</tr>
</table>
	<input type='submit' class="data" name='sub2' value="Submit Loan Details"/>
</form>

<?php
}
?>
<?php

function contributions(){
	
		$con=mysqli_connect("localhost","root","","Sacco");
?>
<style>
	table{
	width:100%;
	background-color:silver;
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}
	
</style>
<div><?php Adminmenu();?></div>
<h1><img src="contr.jpg" alt="Mountain View" style="width:150px;height:100px;"/>Customer contributions </h1>
<table>
		<tr>
		<th>ContributionID</th>
			<th>Customer</th>
			<th>Contribution</th>
			<th>Date</th>
			
	</tr>
	<?php
	$w="select * from contributions";
	$results=mysqli_query($con,$w);
	
	if(mysqli_num_rows($results)>0){
		while($row=mysqli_fetch_array($results)){
		?>
	<tr>
		<td><?php echo $row["ContributionID"];?></td>
		<td><?php echo $row["name"];?></td>
		<td><?php echo $row["Amount"];?></td>
		<td><?php echo $row["Date"];?></td>
		
		<?php
		}
		}
		
		?>
	
		</table>
<div><?php  addcontributions();?></div>
<?php
}
?>
<?php
function addcontributions(){
	
	$con=mysqli_connect("localhost","root","","Sacco");
	$r="select SUM(Amount) FROM contributions";
	$result=mysqli_query($con,$r);
	$row = mysqli_fetch_array($result);
	
	?>
<label>Total Amount In contribution</label><textarea><?php echo $row[0];?></textarea>
<?php 
}	
?>
<?php
function ideas(){
	$con=mysqli_connect("localhost","root","","Sacco");
?>
<style>
	table{
	width:100%;
	background-color:silver;	
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}
	
</style>
<div><?php Adminmenu();?></div
<h1><img src="idea.png" alt="Mountain View" style="width:200px;height:150px;"/>Customer Ideas </h1>
<table>
		<tr>
		<th>MemberID</th>
			<th>Description</th>
			<th>Initial Capital</th>
			
	</tr>
	<?php
	$w="select * from Idea";
	$results=mysqli_query($con,$w);
	
	if(mysqli_num_rows($results)>0){
		while($row=mysqli_fetch_array($results)){
		?>
	<tr>
		<td><?php echo $row["MemberID"];?></td>
		<td><?php echo $row["Description"];?></td>
		<td><?php echo $row["InitialCapital"];?></td>

<?php
		}
		}
		
		?>
	
		</table>
<?php
}
?>
<?php 
function investmentdetails(){
	
?>
<form>
	<h3>Enter Investment  Details</h3>
<table>
<tr>
<td><label>Idea ID:</label></td><td><input type='text' name='loanid' placeholder='Enter Loan ID'/></td>	
</tr>
	<tr>
<td><label>Details:</label></td><td><input type='text' name='loanid' placeholder='Enter loan Detials'/></td>	
</tr>
	
</table>
	<input type='submit' name='idea' value="Submit Investment Details"/>
</form>

<?php
}
?>
<?php

function loanrequests(){
	
	$con=mysqli_connect("localhost","root","","Sacco");
?>
<style>
	table{
	width:100%;
	background-color:silver;	
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}
	
</style>
<div><?php Adminmenu();?></div>
<h1><img src="loan.png" alt="Mountain View" style="width:150px;height:100px;"/>Loan Request</h1>
<table>
		<tr>
		<th>Customer Name</th>
			<th>Amount</th>
			<th>Date</th>
			
	</tr>
	<?php
	$w="select * from LoanRequest";
	$results=mysqli_query($con,$w);
	
	if(mysqli_num_rows($results)>0){
		while($row=mysqli_fetch_array($results)){
		?>
	<tr>
		<td><?php echo $row["Name"];?></td>
		<td><?php echo $row["Amount"];?></td>
		<td><?php echo $row["Date"];?></td>
		
		<?php
		}
		}
		
		?>
	
		</table>
<?php
}
?>
<?php

function loanreports(){
	
	$con=mysqli_connect("localhost","root","","Sacco");
?>

<style>
	table{
	width:100%;
	background-color:silver;	
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}
	
</style>
<div><?php Membermenu();?></div>
<h1><img src="loan.png" alt="Mountain View" style="width:150px;height:100px;"/>Loan Request</h1><br><br><br><br>
<table>
		<tr>
		<th>Name</th>
			<th>Amount</th>
			<th>Status</th>
			
	</tr>


<?php
$lonM="Select * from LoanRequest";
	$lonRpt=mysqli_query($con,$lonM);
	
	if(mysqli_num_rows($lonRpt)>0){
	while($row=mysqli_fetch_array($lonRpt)){
	?>
<tr>
	<td><?php echo $row["Name"];?></td>
	<td><?php echo $row["Amount"];?></td>
	<td><?php echo $row["Status"]?></td>
	<?php
	}
	}
	?>
</table>
<?php
}?>
<?php

function ideareports(){

	$con=mysqli_connect("localhost","root","","Sacco");
?>
<style>
	table{
	width:100%;
	background-color:silver;	
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}
	
</style>
<div><?php Membermenu();?></div>
<h1><img src="loan.png" alt="Mountain View" style="width:150px;height:100px;"/>Idea Reports</h1><br><br><br><br>
<table>
		<tr>
		<th>MemberID</th>
			<th>InitialCapital</th>
			<th>Description</th>
			<th>Status</th>
			
	</tr>


<?php
$lonM="Select * from Idea";
	$lonRpt=mysqli_query($con,$lonM);
	
	if(mysqli_num_rows($lonRpt)>0){
	while($row=mysqli_fetch_array($lonRpt)){
	?>
<tr>
	<td><?php echo $row["MemberID"];?></td>
	<td><?php echo $row["InitialCapital"];?></td>
	<td><?php echo $row["Description"]?></td>
	<td><?php echo $row["Status"]?></td>
	<?php
	}
	}
	?>
</table>
<?php
}?>
<?php

function contributionreports(){
	$con=mysqli_connect("localhost","root","","Sacco");
?>

<style>
	table{
	width:100%;
	background-color:silver;	
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}
	
</style>
<div><?php Membermenu();?></div>
<h1><img src="loan.png" alt="Mountain View" style="width:150px;height:100px;"/>Contribution Reports</h1><br><br><br><br>
<table>
		<tr>
		<th>Username</th>
			<th>Amount</th>
			<th>Date</th>
			<th>Status</th>
			
	</tr>


<?php
$con=mysqli_connect("localhost","root","","Sacco");
$lonM="Select * from contributions";
	$conRpt=mysqli_query($con,$lonM);
	
	if(mysqli_num_rows($conRpt)>0){
	while($row=mysqli_fetch_array($conRpt)){
	?>
<tr>
	<td><?php echo $row["name"];?></td>
	<td><?php echo $row["Amount"];?></td>
	<td><?php echo $row["Date"]?></td>
	<td><?php echo $row["Status"]?></td>
	<?php
	}
	}
	?>
</table>

<?php
}?>
<?php
function Adminmenu()
{
	?>
	<style>	
		 ul {
list-style: none;
padding: 0px;
margin: 0px;	 
}
		h1{
			text-shadow:4px 2px 3px #4ff334;
			height:35px;
			font-size:20px;
			font-weight:bold;
			text-align:center;
			color:lightyellow;
		}
		
#menu{
			width:1100px;
			height:60px;
			font-size:16px;
			font-weight:bold;
			text-align:center;
			text-shadow:3px 2px 3px #333333;
			background-color:#8AD9FF;
			border-radius:8px;
		}
		#menu ul{
			height:auto;
			padding:8px 0px;
            margin:0px;
		}
		#menu li{
			display:inline;
			padding:20px;
		}
  ul li {
display: block;
position: relative;
float: left;
border:0px solid #000
}
}</style>
	<h1><center><?php echo 'THE SACCO MANAGEMENT SYSTEM' ?></center></h1>
<div id="menu" align="right">
	<center><ul>
		<li><a href="?action=homepage">homepage</a></li>
	<li><a href="?action=addmember">Add Member</a></li>
	<li><a href="?action=ideas">idea</a></li>
	<li><a href="?action=viewfiles">View Files</a></li>
	
</ul></center>
<?php
}
?>
<?php
function benefits()
{ 
	?>
	<style>
		table{
	width:100%;
	background-color:silver;	
	}
	th{
	background-color:blue;
	color:white;	
	}
	td{
	background-color:white;
	margin:auto 0;
		
		text-align:center;
	}
	h1{
	text-align:left;
	color:red;	
	}

	</style>
<div><?php Adminmenu();?></div>
<table>
		<tr>
		<th>Username</th>
			<th>Amount</th>
			<th>Percentage</th>
			
	</tr>


<?php
$c= mysqli_connect("localhost","root","","Sacco");
$lonM="Select * from Benefit";
	$lonRpt=mysqli_query($c,$lonM);
	
	if(mysqli_num_rows($lonRpt)>0){
	while($row=mysqli_fetch_array($lonRpt)){
	?>
<tr>
	<td><?php echo $row["Username"];?></td>
	<td><?php echo $row["Amount"];?></td>
	<td><?php echo $row["Percentage"]?></td>
	<?php
	}
	}
	?>
</table>

<?php
$c= mysqli_connect("localhost","root","","Sacco");

$query="SELECT name,SUM(Amount) AS Amount  FROM contributions  GROUP BY name";
$result = mysqli_query($c, $query) or die(mysqli_error($c));
if (mysqli_num_rows($result)>0) {
	# code...
	while($row=mysqli_fetch_array($result)){
		$amount = $row['Amount'];
	//echo"$amount<br>";
	}
}
//total money in the saccco
$r="select SUM(Amount) FROM contributions";
	$result=mysqli_query($c,$r);
	$row = mysqli_fetch_array($result);
//calculating the percentage
	$share=($amount/$row[0]*100);
	
//slecting for the profit
$q="SELECT Profit  FROM Profit";
    $eric = mysqli_query($c, $q)or die(mysqli_error($c));
	if (mysqli_num_rows($eric)>0) {
	# code...
	while($row=mysqli_fetch_array($eric)){
		$profit = $row['Profit'];
		//echo"$profit<br>";
	}
	$z=$profit;
	}
	$q1="SELECT InitialCapital FROM Idea";
    $peter = mysqli_query($c, $q1)or die(mysqli_error($c));
	if (mysqli_num_rows($peter)>0) {
	# code...
	while($row=mysqli_fetch_array($peter)){
		$initialcapital= $row['InitialCapital'];
		//echo"$initialcapital<br>";
	}
	}
	
	if ($z<=$amount) {
		# code...
		$percent=(30/100)*($z);
		$a=(65/100)*($z);
		$l=(5/100)*($amount);
		 //echo"$percent<br>".""."$a<br>"."$l<br>";
		$sum=$percent+$a+$l;
		echo "$sum<br>";
	}
	//$sql = "UPDATE Benefit SET Amount='$sum' AND Percentage='$share'";
	$sql = "UPDATE Benefit SET Amount='$sum'";
	if ($c->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $c->error;
}
$profitb=mysqli_query($c,"select Idea.Description ,Idea.InitialCapital,Idea.Name,Profit.Profit,Profit.DateRecorded from 'Idea' INNER JOIN 'Profit' on Idea.IdeaID=Profit.IdeaID");
?>

<?php }
?>

	<?php
function Membermenu()
{
	?>
	<style>	
		 ul {
list-style: none;
padding: 0px;
margin: 0px;	 
}
		h1{
			text-shadow:4px 2px 3px #4ff334;
			height:35px;
			font-size:20px;
			font-weight:bold;
			text-align:center;
			color:lightyellow;
		}
		
#menu{
			width:1100px;
			height:60px;
			font-size:16px;
			font-weight:bold;
			text-align:center;
			text-shadow:3px 2px 3px #333333;
			background-color:#8AD9FF;
			border-radius:8px;
		}
		#menu ul{
			height:auto;
			padding:8px 0px;
            margin:0px;
		}
		#menu li{
			display:inline;
			padding:20px;
		}
  ul li {
display: block;
position: relative;
float: left;
border:0px solid #000
}
</style>
	<h1><center><?php echo 'THE SACCO MANAGEMENT SYSTEM' ?></center></h1>
<div id="menu" align="right">
	<center><ul>
		<li><a href="?action=memberpage">homepage</a></li>
	
	<li><a href="?action=ideareports">idea</a></li>

	
</ul></center>
<?php
}
?>

<?php
function calender()
{}
?>
