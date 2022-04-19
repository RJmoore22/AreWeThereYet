<?php

echo 'edit page';

?>




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
        $insert1 = "SELECT * FROM DRIVER WHERE DRIVER_ID_NUM='$id'";
        $result1 = $mysqli->query($insert1);
        if($result1 = $mysqli->query($insert1)){
                while ($row = $result1->fetch_assoc()){
                        $fname = $row["FNAME"];
                        $lname = $row["LNAME"];
                        $drivernum = $row["DRIVERS_NUM"];
                        $region = $row["REGION"];
                        $make = $row["CAR_MAKE"];
                        $years = $row["YEARS_EMPLOYED"];
                        $pic = $row["PF_PICTURE"];
                        $model = $row["CAR_MODEL"];
                        $class = $row["CAR_CLASS"];
               }
        }
if(isset($_POST['save']))
{       
        $pic3 = $_POST['pic3'];
        $fname3 = $_POST['fname3'];
        $lname3 = $_POST['lname3'];
        $drivernum3 = $_POST['drivernum3'];
        $region3 = $_POST['region3'];
        $years3 = $_POST['years3'];
        $make3 = $_POST['make3'];
        $model3 = $_POST['model3'];
        $class3 = $_POST['class3'];

        
        $insert3 = "UPDATE DRIVER  SET FNAME ='$fname3', LNAME ='$lname3', DRIVERS_NUM='$drivernum3', REGION= '$region3', CAR_MAKE='$make3', 
        									YEARS_EMPLOYED='$years', PF_PICTURE='$pic3', CAR_MODEL='$model3', CAR_CLASS='$class3'
        									 WHERE DRIVER_ID_NUM = '$id'";
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
                <td>Picture</td>
                <td><input type="text" name="pic3" value="<?php echo $pic ?>"/></td>
        </tr>

                <tr>
                <td>Fname</td>
                <td><input type="text" name="fname3" value="<?php echo $fname ?>"/></td>
        </tr>
        <tr>
                <td>Lname</td>
                <td><input type="text" name="lname3" value="<?php echo $lname ?>"/></td>
        </tr>

                <tr>
                <td>License Num</td>
                <td><input type="text" name="drivernum3" value="<?php echo $drivernum ?>"/></td>
        </tr>
        <tr>
                <td>City</td>
                <td><input type="text" name="region3" value="<?php echo $region ?>"/></td>
        </tr>

                <tr>
                <td>Years Employed</td>
                <td><input type="text" name="years3" value="<?php echo $years ?>"/></td>
        </tr>
        <tr>
                <td>Make</td>
                <td><input type="text" name="make3" value="<?php echo $make ?>"/></td>
        </tr>

                <tr>
                <td>Model</td>
                <td><input type="text" name="model3" value="<?php echo $model ?>"/></td>
        </tr>
        <tr>
                <td>Class</td>
                <td><input type="text" name="class3" value="<?php echo $class ?>"/></td>
        </tr>

     
       
        <tr>
                <td><input type="submit" name="save" value="save" /></td>
        </tr>
</table>
</body>
