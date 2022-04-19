<head>
<link rel="Stylesheet" type ="text/css" href="../css/login.css">
</head>

<body>
<br>
        <br>
        <br>
        
        <div class="container">
    <form method="POST" action="">
        <div id="div_login">
            <h1>Admin Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="login" id="but_submit" />
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
        
        if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $loginquery = "SELECT admin_user FROM admin WHERE admin_user='$username' AND admin_pw='$password' ";
                $result3 = $mysqli->query($loginquery);
                if($result3 = $mysqli->query($loginquery)){
                        while ($row = $result3->fetch_assoc()){
                                 $admin_user= $row["admin_user"];
				
                                 
                                header('Location: support.php');
                        }                                          
                }
	}

?>
</body>
