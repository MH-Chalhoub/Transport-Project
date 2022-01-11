<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>transparent login form</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("bus.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);
        }
        .contact-form
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 450px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: calc(-40px);		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        .contact-form h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #FB9716;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="text"],
        .contact-form input[type="password"]
        {
            border: none;
            border-bottom: 1px solid #FF5E01;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
			width: 50%;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
			transition: background 1s,width 2s;
        }
		.contact-form input[type="submit"]:active {
			width: 60%;
		}
		.contact-form input[type="submit"]:hover{
			background: #EF6D0A;
        }
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"] {
            width: 20%;
        }
		.droit {
			text-align: right;
		}
    </style>
	<?php 
	$dbc = mysqli_connect('localhost','root', '');
	mysqli_select_db($dbc,'Transport1');

		$Monday1 = date("H:i", strtotime($_POST['Monday1']));
		$Monday2 = date("H:i", strtotime($_POST['Monday2']));
		$Tuesday1 = date("H:i", strtotime($_POST['Tuesday1']));
		$Tuesday2 = date("H:i", strtotime($_POST['Tuesday2']));
		$Wednesday1 = date("H:i", strtotime($_POST['Wednesday1']));
		$Wednesday2 = date("H:i", strtotime($_POST['Wednesday2']));
		$Thursday1 = date("H:i", strtotime($_POST['Thursday1']));
		$Thursday2 = date("H:i", strtotime($_POST['Thursday2']));
		$Friday1 = date("H:i", strtotime($_POST['Friday1']));
		$Friday2 = date("H:i", strtotime($_POST['Friday2']));
		$Saturday1 = date("H:i", strtotime($_POST['Saturday1']));
		$Saturday2 = date("H:i", strtotime($_POST['Saturday2']));
		$username = trim($_POST['usere']);
		
		$query = "INSERT INTO PROGRAMMEE 
					VALUES (null,'$username')
				 ";

		if (@mysqli_query($dbc,$query))
		{
			//print '<p>The blog entry has been added!</p>';
		}
		else
		{
			//print '<p style="color:	red;">Could not add the entry because:<br />'.mysql_error( ).'.</p><p>The query being run was:'. $query.'</p>';
		}
		
		$query1 = "	SELECT * 
					FROM PROGRAMMEE 
					WHERE USERE='$username'
				 ";

		if ($r = @mysqli_query($dbc,$query1))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			/*echo "	<script>
				 alert(\"".$row[0]."\");
			</script>";*/
			
			$idp=(int)$row[0];
			
			$query11 = "	INSERT INTO JOURE 
					VALUES (null,$idp,'Monday','$Monday1','$Monday2')
				 ";

			@mysqli_query($dbc,$query11);
			
			$query12 = "	INSERT INTO JOURE 
					VALUES (null,$idp,'Tuesday','$Tuesday1','$Tuesday2')
				 ";

			@mysqli_query($dbc,$query12);
			
			$query13 = "	INSERT INTO JOURE 
					VALUES (null,$idp,'Wednesday','$Wednesday1','$Wednesday2')
				 ";

			@mysqli_query($dbc,$query13);
			
			$query14 = "	INSERT INTO JOURE 
					VALUES (null,$idp,'Thursday','$Thursday1','$Thursday2')
				 ";

			@mysqli_query($dbc,$query14);
			
			$query15 = "	INSERT INTO JOURE 
					VALUES (null,$idp,'Friday','$Friday1','$Friday2')
				 ";

			@mysqli_query($dbc,$query15);
			
			$query16 = "	INSERT INTO JOURE 
					VALUES (null,$idp,'Saturday','$Saturday1','$Saturday2')
				 ";

			@mysqli_query($dbc,$query16);
			
			
		}
		
		$query = "	UPDATE etudiant
					SET idp=$idp 
					WHERE usere = '$username'
				 ";

		if (@mysqli_query($dbc,$query))
		{
			//print '<p>The blog entry has been added!</p>';
		}
	mysqli_close($dbc);
	?>
</head>
<body>
    <div class="contact-form">
        <img src="2.jpg" class="avatar">
        <h2>Student Registered Successfuly</h2>
		<?php 
			echo '<h2>Hello : ' . $username . '</h2>';
			?>
        <form action="Student_profil.php" method="post">
			<center><img src="true.png"></center>
			<input type="hidden" name="usere" value="<?php echo $username; ?>">
            <center><input type="submit" name="" value="Go to your profile"></center>
        </form>
    </div>
</body>
</html>