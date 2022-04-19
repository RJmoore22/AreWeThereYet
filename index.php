<link rel="Stylesheet" type ="text/css" href="../css/default.css">
   <base href="http://104.197.99.179">
<script src="scripts/rotate.js"></script>
<body onload="startRotation()">
  <header>
    <?php include("common/header.html"); ?>
    <?php include("common/banner.html"); ?>
  </header>
 
    <main> 
      

      <?php include("common/menus.html"); ?>
<table>
<td>
      <article id="textLeft">
    <h1><center>Welcome to the Are We There Yet Driving Service Website<center></h1> 
	<br><br>
	<h3>Commitment to Your Safety</h3>
		<p>With every feature and every standard
 		in our community guidlines, we're commited to
 		helping you reach your destination while creating a safe, 
		and more trustworthy experience for our customers<p> 
    
</td>
<td>
    <div id="image">
    <img id="placeholder" src="null"
    alt="slideshow"
    width="400" height="256">
    </div>
</article>
</td>
<tr>
<td>
	<h3>Trustworthy Service</h3>
		<p>Are We There Yet allows you to hand pick your driver out of all the drivers
		around you so you know what to expect when you ride with us! We catagorize every detail, and every review
		of our drivers so you can make the choice that you're most comfortable with.</p>
</td>
	<td>


	<div class="container">
    <form id="userform" method="POST" >
        <div id="div_login">
            <h1>User Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="password" placeholder="Password"/>
            </div>
            <div>
		<input type="Submit" name="login" value="Login" id="but_submit">
        	<input type="Submit" name="create" value="Create Account" id="but=submit">
            </div>
        </div>
    </form>
</div>

 	
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
        
        if(isset($_POST['create'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
        $inster_sql = "INSERT INTO CUSTOMER (CUSTOMER_USERNAME, CUSTOMER_PW) VALUES ('$username', '$password')";
        $result2 = $mysqli->query($inster_sql);
         echo "Welcome $username ! ";
        
        
           }
	 if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $loginquery = "SELECT CUSTOMER_USERNAME FROM CUSTOMER WHERE CUSTOMER_USERNAME='$username' AND CUSTOMER_PW='$password' ";
                $result3 = $mysqli->query($loginquery);

                if($result3 = $mysqli->query($loginquery)){
                        while ($row = $result3->fetch_assoc()){
                                 $CUSTOMER_USERNAME= $row["CUSTOMER_USERNAME"];
                                 
                        
                                echo ' Welcome! '.$CUSTOMER_USERNAME.' ';
                                  }
                                  }else{
                                  	echo "Wrong username or password!";
                                  }
                                  }
                                  



	
?>
	</td>
<tr>
<td>
<br>
	<h3>Operating in Thousands of Regions</h3>
		<p>Our services are available in thousands of cities worldwide, 
		so you can request or schedule a ride even when you're far from home</p>
<br>
</td>
</table>

  </main>
<footer>
<?php include("common/footer.html"); ?>
</footer>
