  <head>
  <link rel="Stylesheet" type ="text/css" href="../css/default.css">
   <base href="http://104.197.99.179">
    <?php include("../common/header.html"); ?>
    <?php include("../common/banner.html"); ?>    
  </head>

    <div>
  <?php include("../common/menus.html"); ?>
</div>
<br> <br>
<div>
    <ul style="background-color:Gold;border-style:solid">
    
  	<form id="reviewform" method="POST">
    <br>
    <article>
    	<p><b>Search Driver's last name: </b></p>
    	<td><input type="text" name="lname">
		<input type="submit" name="search" value="Search">
    	</td>
    	
		<br>
		<br>
        
        <textarea name="comment" rows="6" cols="30" style="width: 696px; height: 172px;"></textarea>
	
        <br>
        <br>
        
        <?php echo "<h3><b>Rating: </b></h3><br><b>| Driving Rating  |  Personality Rating  |  Punctuality Rating  |  Cleanliness Rating  |</b><br>"; ?> 
	<?php include("../common/rating1.html");  ?> <b>
        <?php include("../common/rating2.html");  ?> <b>
	<?php include("../common/rating3.html");  ?> <b>
	<?php include("../common/rating4.html");  ?> <b>
	


        <br><br><br>
        <input type="Submit" name="submit" value="Submit">
        <p style="color:Gold;"> ayy yo funny message </p>
        </article>
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
                $lname = $_POST['lname'];
                $comment = $_POST['comment'];
		$rating = $_POST['rating'];


$sql1 = "SELECT * FROM DRIVER WHERE LNAME='$lname'";
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
                 
                echo
              '<table border="0">
                <tr><br>
                  <td>'.$FNAME.'</td>
                  <td>'.$LNAME.'</td>
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

    </ul>
    <br>
  </body>

  
  </div>
