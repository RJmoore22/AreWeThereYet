  <head>
	<link rel="Stylesheet" type ="text/css" href="../css/admin.css">
   <base href="http://104.197.99.179">
        <?php include("../common/header.html"); ?>
    <?php include("../common/banner.html"); ?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  background-color: white;
  width: 80%;
  font-size: 12;
  background-color: whitesmoke;
  margin-left: auto;
  margin-right: auto;
}
th, td {
	width: 40px;
  padding: 10px;
  text-align: center;
}






</style>

  </head>
  <body>
    <div>
  <?php include("../common/menus.html"); ?>
  </div>
    <br>
    <br>
    <br>

	
			 							
<form id="adminform1" method="POST">      				
<table  border="1">
	
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
               			 $insert1 = "SELECT * FROM CUSTOMER";
                                 $result1 = $mysqli->query($insert1);				
					if($result1 = $mysqli->query($insert1)){
							echo '<tr> 
							<td>Cust ID</td>
							<td>Username</td>
							<td>Password</td>
							<td>Add/Edit/Delete</td>
							</tr>';
                                                      while ($row = $result1->fetch_assoc()){
                                                               $id = $row["CUST_ID"];
								$EDid = $row["CustID"];
                                                               $user = $row["CUSTOMER_USERNAME"];
                                                               $pw = $row["CUSTOMER_PW"];
                                                              echo
                                                            '<table border="0">
                                                              <tr>
                                                                <td>'.$id.'</td>
                                                                <td>'.$user.'</td>
                                                                <td>'.$pw.'</td>
								<td><a href ="pages/view.php?id='.$row['CUST_ID'].'">Edit</a> 
								<a href ="pages/del.php?id='.$row['CUST_ID'].'">Delete</a> 								                        					
								</td>
                                                            </tr>
								';
								
                                                              
                                                              }
								echo '<tr>
								<td>Must refresh after adding record</td>
                                                                <td><input type="text" size="13" name="user1" /></td>
                                                                <td><input type="text" size="13" name="pw1" /></td>
								<td><input type="Submit" value="Add" name="add" />
									
									<input type="Submit" value="Refresh" name="refresh" /></td>
								</tr>';
                                                      }
	
			 if(isset($_POST['add'])){
				
				$user1 = $_POST['user1'];
				$pw1 = $_POST['pw1'];
			 	$insert = "INSERT INTO CUSTOMER (CUSTOMER_USERNAME, CUSTOMER_PW) VALUES ('$user1', '$pw1')";
                                        $result = $mysqli->query($insert);
					}
			if(isset($_POST['add'])){
			header('Location: support.php');
			}
			 
			?>
</table>

<br> <br>
<table  border="1" width ="100%">
        
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
                                 $insert1 = "SELECT * FROM DRIVER";
                                 $result1 = $mysqli->query($insert1);                           
                                        if($result1 = $mysqli->query($insert1)){
                                                        echo '<tr>
                                                        <td>Picture</td> 
                                                        <td>Driver ID</td>
                                                        <td>Fname</td>
                                                        <td>Lname</td>
                                                        <td>License Num</td>
                                                        <td>City</td>
                                                        <td>Years Employed</td>
                                                        <td>Make</td>
                                                        <td>Model</td>
                                                        <td>Class</td>
                                                        <td>Add/Edit/Delete</td>
                                                        </tr>';
                                                      while ($row = $result1->fetch_assoc()){
                                                               $D_id = $row["DRIVER_ID_NUM"];
                                                                $fname = $row["FNAME"];
                                                               $lname = $row["LNAME"];
                                                               $drivernum = $row["DRIVERS_NUM"];
                                                               $region = $row["REGION"];
                                                               $make = $row["CAR_MAKE"];
                                                               $years = $row["YEARS_EMPLOYED"];
                                                               $pic = $row["PF_PICTURE"];
                                                               $model = $row["CAR_MODEL"];
                                                               $class = $row["CAR_CLASS"];
                                                              echo
                                                            '<table border="0">
                                                              <tr>
                                                                <td><img src="'.$pic.'" height="50" width="50"></td>
                                                                <td>'.$D_id.'</td>
                                                                <td>'.$fname.'</td>
                                                                <td>'.$lname.'</td>
                                                                <td>'.$drivernum.'</td>
                                                                <td>'.$region.'</td>
                                                                <td>'.$years.'</td>
                                                                <td>'.$make.'</td>
                                                                <td>'.$model.'</td>
                                                                <td>'.$class.'</td>
                                                                <td><a href ="pages/view2.php?id='.$row['DRIVER_ID_NUM'].'">Edit</a> 
                                                                <a href ="pages/del2.php?id='.$row['DRIVER_ID_NUM'].'">Delete</a>                                                
                                                                </td>
                                                            </tr>
                                                                ';
                                                                
                                                              
                                                              }
                                                                echo '<tr>
                                                                
                                                                <td><input type="file" size="5" name="pic1" /></td>
                                                                <td>Must refresh after adding record</td>
                                                                <td><input type="text" size="5" name="fname1" /></td>
                                                                <td><input type="text" size="5" name="lname1" /></td>
                                                                <td><input type="text" size="5" name="drivernum1" /></td>
                                                                <td><select name="region1" id="cars">
                                                                  <option value="Rochester">Rochester</option>
                                                                  <option value="Pontiac">Pontiac</option>
                                                                  <option value="Aubrurn Hills">Auburn Hills</option>
                                                                  <option value="Troy">Troy</option>
                                                                </select></td>
                                                                <td><input type="text" size="5" name="years1" /></td>
                                                                <td><input type="text" size="5" name="make1" /></td>
                                                                <td><input type="text" size="5" name="model1" /></td>
                                                                <td><select name="class1" id="class">
                                                                  <option value="Sedan">Sedan</option>
                                                                  <option value="SUV">SUV</option>
                                                                  <option value="Sports Utility">Sports Utility</option>
                                                                  <option value="Electric Sedan">Electric Sedan</option>
                                                                </select></td>
                                                                <td><input type="Submit" value="Add" name="add1" />
                                                                    <input type="Submit" value="Refresh" name="refresh1" /></td>
                                                                </tr>';
                                                      }
        
                         if(isset($_POST['add1'])){
                                
                                $pic1 = $_POST['pic1'];
                                $fname1 = $_POST['fname1'];
                                $lname1 = $_POST['lname1'];
                                $drivernum1 = $_POST['drivernum1'];
                                $region1 = $_POST['region1'];
                                $years1 = $_POST['years1'];
                                $make1 = $_POST['make1'];
                                $model1 = $_POST['model1'];
                                $class1 = $_POST['class1'];

                                $insert4 = "INSERT INTO DRIVER (FNAME, LNAME, DRIVERS_NUM, REGION, CAR_MAKE, YEARS_EMPLOYED, PF_PICTURE, CAR_MODEL, 
                                CAR_CLASS) VALUES ('$fname1', '$lname1', '$drivernum1', '$region1', '$make1', '$years1', '$pic1',
                                								   '$model1', '$class1')";
                                        $result = $mysqli->query($insert4);
                                        }
                    
                        if(isset($_POST['refresh1'])){
                        header('Location: support.php');
                        }
                         
                        ?>
</table>
</form>














  </body>
      <footer>
      <?php include("../common/footer.html"); ?>
    </footer>
