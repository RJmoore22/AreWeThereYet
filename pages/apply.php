


  
  <head>
    <link rel="Stylesheet" type ="text/css" href="../css/default.css">
   <base href="http://104.197.99.179">
        <?php include("../common/header.html"); ?>
    <?php include("../common/banner.html"); ?>
  </head>
  <body>
     
    <div>
   <?php include("../common/menus.html"); ?>
  </div>
  <form id="applyform"  method="post">

    <table>
	<tr>
	<td></td>
        <td>First Name: </td>
        <td><input type="text" id="firstName" name="fname"> </td>


	<td>Car Class: </td>
	<td><select name="carclass">
          <option>Sedan</option>
          <option>SUV</option>
          <option>Sport Utility</option>
          <option>Electric Sedan</option>
          </select></td>
       </tr>

	<tr>
	<td></td>
	<td>Last Name: </td>
	<td><input type="text" id="lastName"  name="lname"> </td>

	<td>Car Make: </td>
	<td><input type="text" id="carMake" name="carmake"> </td>

        </tr>
      <tr>
	<td></td>
        <td>City: </td>
        <td><select name="region">
          <option>Rochester</option>
          <option>Auburn Hills</option>
          <option>Troy</option>
          <option>Pontiac</option>
          </select></td>

	<td>Car Model: </td>
	<td><input type="text" id="carModel" name="carmodel"> </td>
      </tr>
      <tr>
      <td></td>
        <td>Availability:</td>
        <td> <select name="day">
			<option>Monday</option>
			<option>Tuesday</option>
			<option>Wednesday</option>
			<option>Thursday</option>
			<option>Friday</option>
			<option>Saterday</option>
			<option>Sunday</option>
         </td>


	<td>Drivers License Number:</td>
	<td><input type="text" id="driversNum" name="driversnum"></td>

	 <tr>
	<td></td>
	<td>Upload Profile Picture:</td>
	<td>
	<image src="../images/image.jpg" id="photo"  width="80" height="80">
	<input type="file" id ="file" name="image">
	
	
	</td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><input type="Submit" name ="submit" value="Submit Application"> </td>
        <td></td>
        <td></td>
        <td></td>
        <td> </td>
      </tr>

    </table>
  </form>
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

		/*
		$currentDirectory=getcwd();
		$uploadDirectory="/images/";

		$errors = [];

		$fileExtensionsAllowed=['jpg','jpeg','png'];

		$fileName=$_FILES['the_file']['name'];
		$fileTmpName=$_FILES['the_file']['tmp_name'];
		$fileType=$_FILES['the_file']['type'];
		$fileExtension=strtolower(end(explode('.',$filesName)));

		$uploadPath=$currentDirectory.$uploadDirectory.basename($fileName);
		*/

		if(isset($_POST['submit'])){

				$address='../images/';
		                $fname = $_POST['fname'];
		                $lname = $_POST['lname'];
		                $region = $_POST['region'];
		                $photo = $_POST['image'];
		                $carmake = $_POST['carmake'];
		                $carmodel = $_POST['carmodel'];
		                $carclass = $_POST['carclass'];
				$driversnum = $_POST['driversnum'];


					/*
					if (! in_array($fileExtension,$fileExtensionsAllowed)) {
					   $errors[]="File extension not allowed";}
					if(empty($errors)){
					$didUpload=move_uploaded_file($fileTmpName, $uploadPath);

						if($didUpload){
							echo"The file " . basename($fileName) . "has been uploaded";}
						else{echo "an error occured. Please contect the administrator";}}
					*/

        				$insert = "INSERT INTO DRIVER (FNAME, LNAME, DRIVERS_NUM, REGION, CAR_MAKE, YEARS_EMPLOYED, PF_PICTURE, CAR_MODEL, CAR_CLASS)
        				 VALUES ('$fname', '$lname', '$driversnum', '$region', '$carmake', '0', '$addressphoto', '$carmodel', '$carclass')";
        				$result = $mysqli->query($insert);
        				echo '<table border="2" cellspacing="2" cellpadding="2">
        				      <tr>
        				    <td> <font face="Arial">First name</font> </td>
        				    <td> <font face="Arial">Last name</font> </td>
        				    <td> <font face="Arial">region</font> </td>
        				    <td> <font face="Arial">years employed</font> </td>
        				    <td> <font face="Arial">picture</font> </td>
        				    <td> <font face="Arial">car make</font> </td>
        				    <td> <font face="Arial">car model</font> </td>
        				    <td> <font face="Arial">car class</font> </td>
        				      </tr>';


        				      $sql = "Select * FROM DRIVER WHERE FNAME= '$fname' AND LNAME= '$lname' ";
        				      $result1 = $mysqli->query($sql);

        				      if($result1 = $mysqli->query($sql)){
        				              while ($row = $result1->fetch_assoc()){
        				                       $FNAME = $row["FNAME"];
        				                       $LNAME = $row["LNAME"];
        				                       $REGION = $row["REGION"];
        				                       $CAR_MAKE = $row["CAR_MAKE"];
        				                       $YEARS_EMPLOYED = $row["YEARS_EMPLOYED"];
        				                       $PF_PICTURE = $row["PF_PICTURE"];
        				                       $CAR_MODEL = $row["CAR_MODEL"];
        				                       $CAR_CLASS = $row["CAR_CLASS"];
        				                      echo
        				                    '<table border="0">
        				                      <tr>
        				                        <td>'.$FNAME.'</td>
        				                        <td>'.$LNAME.'</td>
        				                        <td>'.$REGION.'</td>
        				                      <td>'.$YEARS_EMPLOYED.'</td>
        				                      <td><img src="'.$PF_PICTURE.'" height="80" width="80"></td>
        				                      <td>'.$CAR_MAKE.'</td>
        				                      <td>'.$CAR_MODEL.'</td>
        				                      <td>'.$CAR_CLASS.'</td>
        				                    </tr>';

        				                      }
        				              }

	}


?>
  </body>
<script src="../scripts/app.js"></script>

