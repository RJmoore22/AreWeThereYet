<?php

echo'Delete Page';

?>



<?php
                         $host = '130.211.234.211';
                         $username = 'root';
                         $password = 'csi3450';
                         $db = 'TaxiDriverDB';
                         $port = '3306';
                         $mysqli = new mysqli($host, $username, $password, $db, $port);
        $id =$_REQUEST['id'];
        
        
        $insert1 = "DELETE FROM DRIVER WHERE DRIVER_ID_NUM='$id'";
        $result1 = $mysqli->query($insert1);
        
       header("Location: support.php");
?>
