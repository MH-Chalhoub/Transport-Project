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
		if(isset($_POST['Sign_In']))
		{
			$dbc = mysqli_connect('localhost','root', '');
			mysqli_select_db($dbc,'Transport1');
			
			$username = trim($_POST['usere']);
			$password = $_POST['password'];
			$isStudent=0;
			$isChauffeur=0;
			$query1 = "	SELECT COUNT(*), PASSWORDE
						FROM etudiant 
						WHERE USERE = '$username'
					 ";

			if ($r = @mysqli_query($dbc,$query1))
			{
				$row = mysqli_fetch_array($r,MYSQLI_NUM);
				$isStudent=(int)$row[0];
				$passworde=$row[1];
			}
			$query1 = "	SELECT COUNT(*), PASSWORDC 
						FROM chaufeur 
						WHERE USERC = '$username'
					 ";

			if ($r = @mysqli_query($dbc,$query1))
			{
				$row = mysqli_fetch_array($r,MYSQLI_NUM);
				$isChauffeur=(int)$row[0];
				$passwordc=$row[1];
			}
			if($isStudent && $passworde==$password)
			{
				header("Location: http://localhost:8080/Tp/Transport_final/Student_profil.php?usere=$username");
				exit;
			}
			else if($isChauffeur && $passwordc==$password)
			{
				header("Location: http://localhost:8080/Tp/Transport_final/chauffeur_profil.php?usere=$username");
				exit;
			}
			else
			{
				/*echo "	<script>
					 alert(\"Password or Username incorrect !!!\");
				</script>";*/
			}
			mysqli_close($dbc);
		}
	?>
</head>
<body>
    <div class="contact-form">
        <img src="2.jpg" class="avatar">
        <h2>Contact Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <p>Username</p>
            <input type="text" name="usere" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <center><input type="submit" name="Sign_In" value="SignIn"></center>
			<p class="droit"><a href="choose.php" style="color:#FB9716">Sign up?</a></p>
        </form>
    </div>
</body>
</html>