  <head>
    
    <link rel="Stylesheet" type ="text/css" href="../css/default.css">
   <base href="http://104.197.99.179">
     
  </head>
  <body>
     <header>
	<?php include("../common/header.html"); ?>
    <?php include("../common/banner.html"); ?>
     </header>
    <div>
  <?php include("../common/menus.html"); ?>
  </div>
  <form id="rideform" method="POST">
    <table>
      <tr>

        <td>City:</td>
        <td><select name="region">
          <option>Troy</option>
          <option>Auburn Hills</option>
          <option>Rochester</option>
          <option>Pontiac</option>
          </select></td>
        <td>Where From:</td>
        <td><input type="text" name="from"></td>
        
        </tr>
        <tr>

        <td>Day of Ride:</td>
        <td><select name ="day">
        	<option>Sunday</option>
		<option>Monday</option>
		<option>Tuesday</option>
		<option>Wednesday</option>
		<option>Thursday</option>
		<option>Friday</option>
		<option>Saterday</option>
        	</td>
        <td>Where To:</td>
        <td><input type="text"name="to"></td>
        
      </tr>
      <tr>
        
        <td>Time of Ride:</td>
        <td><input type="text"name="time" value="ASAP"></td>
        <td>Preferred Class of Vehicle</td>
        <td><select name="class">
          <option>Sedan</option>
          <option>SUV</option>
          <option>Sports Utility</option>
          <option>Electric Sedan</option>
          </select></td>

      </tr>
      <tr>

        <td>Press to Search for your Driver!</td>
        <td><input type="Submit" name="search" value="Search"> </td>        
        <td>Press to Select Driver!</td>
        <td><input type="submit" value="Select"> </td>

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
	if(isset($_POST['search'])){
		$region = $_POST['region'];
		$class = $_POST['class'];

$sql1 = "Select * FROM DRIVER WHERE REGION= '$region'AND CAR_CLASS= '$class' ";
$result1 = $mysqli->query($sql1);

echo '<table border="2" cellspacing="2" cellpadding="2">
      <tr>
          <td> <font face="Arial">First name</font> </td>
          <td> <font face="Arial">Last name</font> </td>
        <td> <font face="Arial">years employed</font> </td>
        <td> <font face="Arial">picture</font> </td>
<td> <font face="Arial">car make</font> </td>    
    <td> <font face="Arial">car model</font> </td>
        <td> <font face="Arial">car class</font> </td>
      </tr>';
	
if($result1 = $mysqli->query($sql1)){
        while ($row = $result1->fetch_assoc()){
                 $FNAME = $row["FNAME"];
                 $LNAME = $row["LNAME"];
                 $CAR_MAKE = $row["CAR_MAKE"];
                 $YEARS_EMPLOYED = $row["YEARS_EMPLOYED"];
                 $PF_PICTURE = $row["PF_PICTURE"];
                 $CAR_MODEL = $row["CAR_MODEL"];
                 $CAR_CLASS = $row["CAR_CLASS"];
		$RATING = $row["RATING"];
		$REVIEW = $row["REVIEW"];
                echo
              '<table border="0">
		<tr><br>
                  <td><input type="Checkbox">    '.$FNAME.'</td>
                  <td>'.$LNAME.'</td>
                <td>'.$YEARS_EMPLOYED.'</td>
                <td><img src="'.$PF_PICTURE.'" height="80" width="80"></td>
		<td>'.$CAR_MAKE.'</td>
                <td>'.$CAR_MODEL.'</td>
                <td>'.$CAR_CLASS.'</td>
                </tr>
		<tr>
        
		<table border="0>"
                <tr>
                <td>'.$RATING.'</td>
                <td>'.$REVIEW.'</td>
              </tr>';
		
                }
        }
}
  ?>

</body>
