<?php
$servername = "localhost";
$username = "hrutvik";
$password = "hrutvik";
$dbname = "RMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$i=0;
$arr=array("usn","name","cur_sem","batch","dno");
while($i<5){
	if($_POST[$arr[$i]]!=NULL){
		if($arr[$i]=="name"||$arr[$i]=="batch")
			$_POST[$arr[$i]]="'".$_POST[$arr[$i]]."'";
		//echo "UPDATE Students SET ".$arr[$i]."=".$_POST[$arr[$i]]." WHERE usn=".$_POST["usnc"]."<br>";	
		$sql = "UPDATE Students SET ".$arr[$i]."=".$_POST[$arr[$i]]." WHERE usn=".$_POST["usnc"];
		if ($conn->query($sql) === FALSE) {
    			echo $conn->error."<br>";
			break;
		}
		else
			echo $arr[$i]." is updated successfully.<br>";
	}
	$i=$i+1;
}	


$conn->close();
?>
