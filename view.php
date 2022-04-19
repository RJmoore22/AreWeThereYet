<?php
                        $host = '130.211.234.211';
                         $username = 'root';
                         $password = 'csi3450';
                         $db = 'TaxiDriverDB';
                         $port = '3306';
                         $mysqli = new mysqli($host, $username, $password, $db, $port);
                                 if ($mysqli -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                exit();
                                 }
	$id=$_REQUEST['id'];
	$insert1 = "SELECT * FROM CUSTOMER WHERE CUST_ID='$id'";
        $result1 = $mysqli->query($insert1);
	if($result1 = $mysqli->query($insert1)){
		while ($row = $result1->fetch_assoc()){
			$user = $row["CUSTOMER_USERNAME"];
			$pw = $row["CUSTOMER_PW"];
		}
	}


if(isset($_POST['save']))
{	
	$user3 = $_POST['user3'];
	$pw3 = $_POST['pw3'];
	
	$insert3 = "UPDATE CUSTOMER SET CUSTOMER_USERNAME ='$user3', CUSTOMER_PW ='$pw3' WHERE CUST_ID = '$id'";
	$result3 = $mysqli->query($insert3);

	echo "Saved!";
	
	header("Location: support.php");			
}



?>

<?php
echo 'Edit Record';
?>


<body>
<form method="post">
<table>
	<tr>
		<td>Username</td>
		<td><input type="text" name="user3" value="<?php echo $user ?>"/></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="pw3" value="<?php echo $pw ?>"/></td>
	</tr>
	<tr>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>

</body>
