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
            left: 60%;
            transform: translate(-50%,-50%);
            width: 1200px;
            height: 700px;
            padding: 20px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
		.contact-form1
        {
            position: absolute;
            top: 50%;
            left: 10.5%;
            transform: translate(-50%,-50%);
            width: 300px;
            height: 700px;
            padding: 20px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: 4%;		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
			transition: width 1s,height 1s;
        }
		.avatar:hover {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: 4%;		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        .contact-form1 h2 {
            margin: 0;
            padding: 10px 0 10px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
		.contact-form1 h3 {
            margin: 0;
            padding: 10px 0 10px;
            color: #FF5E01;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
			display:block;
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
            margin-right: 20px;
            border-bottom: 1px solid #FF5E01;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
			display:block;
			width: 100%;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border: none;
            outline: none;
			transition: background 1s;
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
		input[type="radio"] {
            margin-top: 20px;
            width: 20%;
            padding: 0;
        }
		table {
		width: 100%;
		border-spacing: 20px 0px;
		}
		.choix td {
			display:inline-block;
		}
		.near_radio {
			margin: 0;
            padding: 0;
            font-weight: bold;
            color: #FF5E01;
		}
		table.show {
			background: rgba(114, 43, 5,.5);
			border-collapse: collapse;
			width: 100%;
			overflow: auto;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		.show tr:nth-child(even){background: rgba(255,250,0,.5);}

		th {
			background: rgba(255, 97, 0,.5);
			color: white;
			}
		input[type="time"] {
			border: none;
			background: transparent;
			border-bottom: 1px solid red;
        }
		.contact-form input[type="button"]
        {
            height: 30px;
			width: 50%;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 5%;
			transition: background 1s,width 2s;
        }
		input[type="number"] {
			border: none;
            margin-right: 20px;
            border-bottom: 1px solid #FF5E01;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
		.table-wrapper-scroll-y {
			display: block;
			max-height: 150px;
			max-weight: 300px;
			overflow-y: auto;
			overflow-x: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}
		<?php 
		$dbc = mysqli_connect('localhost','root', '');
		mysqli_select_db($dbc,'Transport1');
		
		$username = trim($_GET['usere']);
		
		if (isset($_POST['usere']))
			$username = trim($_POST['usere']);

		$query1 = "	SELECT * 
					FROM PROGRAMMEE 
					WHERE USERE='$username'
				 ";

		if ($r = @mysqli_query($dbc,$query1))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$idp=(int)$row[0];
		}
		
		if (isset($_POST['update']))
		{
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
			
			$query11 = "UPDATE JOURE 
						SET HEURE_DE_DEPART='$Monday1',HEURE_DE_RETOUR='$Monday2'
						WHERE JOUR='Monday' AND IDP=$idp
				 ";

			@mysqli_query($dbc,$query11);
			
			$query12 = "UPDATE JOURE 
						SET HEURE_DE_DEPART='$Tuesday1',HEURE_DE_RETOUR='$Tuesday2'
						WHERE JOUR='Tuesday' AND IDP=$idp
				 ";

			@mysqli_query($dbc,$query12);
			
			$query13 = "UPDATE JOURE 
						SET HEURE_DE_DEPART='$Wednesday1',HEURE_DE_RETOUR='$Wednesday2'
						WHERE JOUR='Wednesday' AND IDP=$idp
				 ";

			@mysqli_query($dbc,$query13);
			
			$query14 = "UPDATE JOURE 
						SET HEURE_DE_DEPART='$Thursday1',HEURE_DE_RETOUR='$Thursday2'
						WHERE JOUR='Thursday' AND IDP=$idp
				 ";

			@mysqli_query($dbc,$query14);
			
			$query15 = "UPDATE JOURE 
						SET HEURE_DE_DEPART='$Friday1',HEURE_DE_RETOUR='$Friday2'
						WHERE JOUR='Friday' AND IDP=$idp
				 ";

			@mysqli_query($dbc,$query15);
			
			$query16 = "UPDATE JOURE 
						SET HEURE_DE_DEPART='$Saturday1',HEURE_DE_RETOUR='$Saturday2'
						WHERE JOUR='Saturday' AND IDP=$idp
				 ";

			@mysqli_query($dbc,$query16);
		}

		$query = "	SELECT * 
					FROM JOURE 
					WHERE IDP=$idp
					ORDER BY IDJ ASC";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Monday1 = $row[3];
			$Monday2 = $row[4];
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Tuesday1 = $row[3];
			$Tuesday2 = $row[4];
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Wednesday1 = $row[3];
			$Wednesday2 = $row[4];
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Thursday1 = $row[3];
			$Thursday2 = $row[4];
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Friday1 = $row[3];
			$Friday2 = $row[4];
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Saturday1 = $row[3];
			$Saturday2 = $row[4];
			$test=sum_the_time($Saturday1, $Saturday2);
		}
		
		$query1 = "	SELECT * 
					FROM ETUDIANT 
					WHERE USERE='$username'
				 ";

		if ($r = @mysqli_query($dbc,$query1))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$vehicule=$row[2];
			$prenom=$row[3];
			$nom=$row[4];
			$location=$row[5];
			$telephone=$row[6];
			$montant=$row[7];
		}
		$query1 = "	SELECT chaufeur.USERC
					FROM chaufeur
					WHERE chaufeur.NUMERO_DU_VEHICULE=$vehicule
				 ";

		if ($r = @mysqli_query($dbc,$query1))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$returnwith=$row[0];
		}
		mysqli_close($dbc);
		//function that add 2 times help to calculate the average for the return time
		function sum_the_time($time1, $time2) {
			$times = array($time1, $time2);
			$seconds = 0;
			foreach ($times as $time)
			{
			list($hour,$minute,$second) = explode(':', $time);
			$seconds += $hour*3600;
			$seconds += $minute*60;
			$seconds += $second;
			}
			$seconds = $seconds/2;
			$hours = floor($seconds/3600);
			$seconds -= $hours*3600;
			$minutes  = floor($seconds/60);
			$seconds -= $minutes*60;
			if($seconds < 9)
			{
			$seconds = "0".$seconds;
			}
			if($minutes < 9)
			{
			$minutes = "0".$minutes;
			}
			if($hours < 9)
			{
			$hours = "0".$hours;
			}
			return "{$hours}:{$minutes}:{$seconds}";
		}
	?>

    </style>
</head>
<body>
	<div class="contact-form1"> 	 	
        <a href="sign_in.php"><center><img src="2.jpg" class="avatar"></center></a>
		<hr>
        <?php 
			echo '<h2>Hello : ' . $username . '</h2><hr>';
			echo '<h3>vehicule : ' . $vehicule . '</h3>';
			echo '<h3>prenom : ' . $prenom . '</h3>';
			echo '<h3>nom : ' . $nom . '</h3>';
			echo '<h3>location : ' . $location . '</h3>';
			echo '<h3>telephone : ' . $telephone . '</h3>';
			//echo '<h3>montant : ' . $montant . '</h3>';
			
			?>
		
		<hr>
	</div>
    <div class="contact-form">
	<fieldset>
				<legend><p>Map:</p></legend>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13327.278978910097!2d35.4868383!3d33.3757717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slb!4v1546331768091" width="100%" height="200px" frameborder="0" style="border:0" allowfullscreen></iframe>
		</fieldset>
		<fieldset>
				<legend><p>Program:</p></legend>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div class="table-wrapper-scroll-y">
			
				<table class="show">
					<tr>
						<th><p>Day</p></th>
						<th><p>From - hh</p></th>
						<th><p>To   - hh</p></th>
					</tr>
					<tr>
						<td>Monday :</td>
						<td> <input type="time" name="Monday1" value="<?php echo $Monday1; ?>"></td>
						<td> <input type="time" name="Monday2" value="<?php echo $Monday2; ?>"></td>
					</tr>
					<tr>
						<td>Tuesday :</td>
						<td> <input type="time" name="Tuesday1" value="<?php echo $Tuesday1; ?>"></td>
						<td> <input type="time" name="Tuesday2" value="<?php echo $Tuesday2; ?>"></td>
					</tr>
					<tr>
						<td>Wednesday :</td>
						<td> <input type="time" name="Wednesday1" value="<?php echo $Wednesday1; ?>"></td>
						<td> <input type="time" name="Wednesday2" value="<?php echo $Wednesday2; ?>"></td>
					</tr>
					<tr>
						<td>Thursday :</td>
						<td> <input type="time" name="Thursday1" value="<?php echo $Thursday1; ?>"></td>
						<td> <input type="time" name="Thursday2" value="<?php echo $Thursday2; ?>"></td>
					</tr>
					<tr>
						<td>Friday :</td>
						<td> <input type="time" name="Friday1" value="<?php echo $Friday1; ?>"></td>
						<td> <input type="time" name="Friday2" value="<?php echo $Friday2; ?>"></td>
					</tr>
					<tr>
						<td>Saturday :</td>
						<td> <input type="time" name="Saturday1" value="<?php echo $Saturday1; ?>"></td>
						<td> <input type="time" name="Saturday2" value="<?php echo $Saturday2; ?>"></td>
					</tr>
				</table>
				
			</div>
			<input type="hidden" name="usere" value="<?php echo $username; ?>">
			<div><input type="submit" name="update" value="Update"></div>
        </form>
		</fieldset>
		<fieldset>
				<legend><p>Coming back:</p></legend>
		<div class="table-wrapper-scroll-y">
			
				<table class="show">
					<tr>
						<th><p>Day</p></th>
						<th><p>Coming back hour</p></th>
						<th><p>Coming back with</p></th>
					</tr>
					<tr>
						<td>Monday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Monday2; ?>"></td>
						<td><?php echo $returnwith; ?></td>
					</tr>
					<tr>
						<td>Tuesday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Tuesday2; ?>"></td>
						<td><?php echo $returnwith; ?></td>
					</tr>
					<tr>
						<td>Wednesday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Wednesday2; ?>"></td>
						<td> <?php echo $returnwith; ?></td>
					</tr>
					<tr>
						<td>Thursday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Thursday2; ?>"></td>
						<td><?php echo $returnwith; ?></td>
					</tr>
					<tr>
						<td>Friday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Friday2; ?>"></td>
						<td><?php echo $returnwith; ?></td>
					</tr>
					<tr>
						<td>Saturday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Saturday2; ?>"></td>
						<td><?php echo $returnwith; ?></td>
					</tr>
				</table>
			</div>
				</fieldset>
    </div>
</body>
</html>